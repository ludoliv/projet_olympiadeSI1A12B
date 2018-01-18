package com.example.olivet.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.MatrixCursor;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.view.ViewParent;
import android.view.Window;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SimpleCursorAdapter;
import android.widget.TextView;

import java.util.ArrayList;

public class Planning extends Activity {

    Integer sommeListeSansPre(ArrayList<Integer> liste){
        int somme = 0;
        boolean pre = true;
        for (Integer elem : liste){
            if (pre){
                pre = false;
            }
            else {
                somme += elem;
            }
        }
        return somme;
    }

    ArrayList<Integer> listeID(ArrayList<ArrayList<Integer>> liste){
        ArrayList<Integer> listeRes = new ArrayList<Integer>();
        for (ArrayList<Integer> listeAux : liste){
            listeRes.add(listeAux.get(0));
        }
        return listeRes;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        setContentView(R.layout.planning);

        Button buttonPlanningAccueil = (Button)findViewById(R.id.buttonPlanningAccueil);
        buttonPlanningAccueil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                new AlertDialog.Builder(view.getContext())
                        .setIcon(android.R.drawable.ic_dialog_alert)
                        .setTitle("Retour vers l'accueil")
                        .setMessage("Vous allez être déconnecté, vouler-vous continuer?")
                        .setPositiveButton("Oui", new DialogInterface.OnClickListener()
                        {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                finish();
                            }

                        })
                        .setNegativeButton("Non", null)
                        .show();
            }
        });

        TextView tvIdJury = (TextView) findViewById(R.id.textViewIdJury);
        final int id = getIntent().getExtras().getInt("NumJury");
        tvIdJury.setText(tvIdJury.getText().toString()+id);

        ImageView legende=(ImageView) findViewById(R.id.imageView7);
        legende.setImageResource(R.drawable.legende_planning);

        // Définition des colonnes
// NB : SimpleCursorAdapter a besoin obligatoirement d'un ID nommé "_id"
        String[] columns = new String[] { "_id", "col1", "col2" };

// Définition des données du tableau
// les lignes ci-dessous ont pour seul but de simuler
// un objet de type Cursor pour le passer au SimpleCursorAdapter.
// Si vos données sont issues d'une base SQLite,
// utilisez votre "cursor" au lieu du "matrixCursor"
        MatrixCursor matrixCursor= new MatrixCursor(columns);
        startManagingCursor(matrixCursor);
        int k = 1;
        matrixCursor.addRow(new Object[] { k,"Nom évenement","Horaire" });
        k += 1;
        for (int i = 0; i < getIntent().getExtras().getStringArrayList("nomProjet").size(); i++){
            if (i == 0){
                matrixCursor.addRow(new Object[] { k,
                        getIntent().getExtras().getStringArrayList("nomProjet").get(0),
                        getIntent().getExtras().getStringArrayList("heureD").get(0)+" - "
                        + getIntent().getExtras().getStringArrayList("heureF").get(0) });
                k += 1;
            }
            else if (getIntent().getExtras().getStringArrayList("heureF").get(i-1).equals(getIntent().getExtras().getStringArrayList("heureD").get(i))){
                matrixCursor.addRow(new Object[] { k,
                        getIntent().getExtras().getStringArrayList("nomProjet").get(i),
                        getIntent().getExtras().getStringArrayList("heureD").get(i)+" - "
                                + getIntent().getExtras().getStringArrayList("heureF").get(i) });
                k += 1;
            }
            else {
                matrixCursor.addRow(new Object[] { k,"Pause",
                        getIntent().getExtras().getStringArrayList("heureF").get(i-1)+" - "
                                +getIntent().getExtras().getStringArrayList("heureD").get(i)});
                k += 1;
                matrixCursor.addRow(new Object[] { k,
                        getIntent().getExtras().getStringArrayList("nomProjet").get(i),
                        getIntent().getExtras().getStringArrayList("heureD").get(i)+" - "
                                + getIntent().getExtras().getStringArrayList("heureF").get(i) });
                k += 1;
            }
        }
        //matrixCursor.addRow(new Object[] { 2,"Projet Ariane","9h40 - 10h00" });
        //matrixCursor.addRow(new Object[] { 3,"Projet RoboDop","10h00 - 10h20" });
        //matrixCursor.addRow(new Object[] { 4,"Projet ElectroCar","10h20 - 10h40" });
        //matrixCursor.addRow(new Object[] { 5,"Pause","10h40 - 10h50" });
        //matrixCursor.addRow(new Object[] { 6,"Projet Sondage","10h50 - 11h10" });
        //matrixCursor.addRow(new Object[] { 7,"Projet Test","11h10 - 11h30" });
        //matrixCursor.addRow(new Object[] { 8,"Projet Jalon","11h30 - 11h50" });

// on prendra les données des colonnes 1 et 2...
        String[] from = new String[] {"col1", "col2"};

// ...pour les placer dans les TextView définis dans "row_item.xml"
        int[] to = new int[] { R.id.textViewCol1, R.id.textViewCol2};

// création de l'objet SimpleCursorAdapter...
        SimpleCursorAdapter adapter = new SimpleCursorAdapter(this, R.layout.row_item, matrixCursor, from, to, 0){
            @Override
            public View getView(int position, View convertView, ViewGroup parent){
                // Get the current item from ListView
                View view = super.getView(position,convertView,parent);
                TextView tv = view.findViewById(R.id.textViewCol1);
                String text = tv.getText().toString();
                if (position != 0 && text != "Pause"){
                    GroupeManager gpMan = new GroupeManager(view.getContext());
                    gpMan.open();
                    int idGp = gpMan.getNumGroupe(text);
                    gpMan.close();
                    ArrayList<ArrayList<Integer>> listeGrpNote = Page_connexion.listeGrpNote;
                    boolean test = true;
                    int indice = 0;
                    while (indice<listeGrpNote.size() && test){
                        ArrayList<Integer> listeNote = listeGrpNote.get(indice);
                        indice += 1;
                        String couleur = "#389f38";//Vert
                        if (idGp == listeNote.get(0)) {
                            int fin = 0;
                            while (fin < listeNote.size() && couleur.equals("#389f38")) {
                                if (sommeListeSansPre(listeNote) == 0) {
                                    // Set a background color for ListView regular row/item
                                    couleur = "#dddf1d";//Jaune
                                } else if (listeNote.get(fin) == null) {
                                    // Set the background color for alternate row/item
                                    couleur = "#df1d1d";//Rouge
                                }
                                fin += 1;
                                test = false;
                            }
                        }
                        else{
                            couleur = "#df1d1d";//Rouge
                        }
                        view.setBackgroundColor(Color.parseColor(couleur));
                    }

                    /*for (ArrayList<Integer> listeNote : listeGrpNote) {
                        String couleur = "#389f38";//Vert
                        System.out.println(listeNote.get(0));
                        if (idGp == listeNote.get(0)) {
                            int fin = 0;
                            while (fin < listeNote.size() && couleur.equals("#389f38")) {
                                if (sommeListeSansPre(listeNote) == 0) {
                                    // Set a background color for ListView regular row/item
                                    couleur = "#dddf1d";//Jaune
                                } else if (listeNote.get(fin) == null) {
                                    // Set the background color for alternate row/item
                                    couleur = "#df1d1d";//Rouge
                                }
                                fin += 1;
                            }
                        }
                        else{
                            couleur = "#df1d1d";//Rouge
                        }
                        view.setBackgroundColor(Color.parseColor(couleur));
                    }*/
                }
                return view;
            }
        };

// ...qui va remplir l'objet ListView
        ListView lv = (ListView) findViewById(R.id.lv);
        lv.setOnItemClickListener(new AdapterView.OnItemClickListener(){
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                TextView tv = view.findViewById(R.id.textViewCol1);
                String text = tv.getText().toString();
                if (i != 0 && text != "Pause") {
                    GroupeManager gpMan = new GroupeManager(view.getContext());
                    gpMan.open();
                    int idGp = gpMan.getNumGroupe(text);
                    gpMan.close();
                    if (listeID(Page_connexion.listeGrpNote).contains(idGp)){
                        Intent intent = new Intent(Planning.this, projet_desc.class);
                        intent.putExtra("NumJury", id);
                        startActivity(intent);
                    }
                    else{
                        Intent intent = new Intent(Planning.this, AjoutNote.class);
                        intent.putExtra("NumJury", id);
                        startActivity(intent);
                    }
                }

                if(i==5 || i==7){

                }
            }
        });
        lv.setAdapter(adapter);
    }

    @Override
    public void onBackPressed() {
        new AlertDialog.Builder(this)
                .setIcon(android.R.drawable.ic_dialog_alert)
                .setTitle("Retour vers l'accueil")
                .setMessage("Vous allez être déconnecté, vouler-vous continuer?")
                .setPositiveButton("Oui", new DialogInterface.OnClickListener()
                {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        finish();
                    }

                })
                .setNegativeButton("Non", null)
                .show();
    }
}
