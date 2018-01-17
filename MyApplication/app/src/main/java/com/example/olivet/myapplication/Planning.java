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
import android.view.Window;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SimpleCursorAdapter;
import android.widget.TextView;

public class Planning extends Activity {

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
        matrixCursor.addRow(new Object[] { 1,"Nom évenement","Horaire" });
        matrixCursor.addRow(new Object[] { 2,"Projet Ariane","9h40 - 10h00" });
        matrixCursor.addRow(new Object[] { 3,"Projet RoboDop","10h00 - 10h20" });
        matrixCursor.addRow(new Object[] { 4,"Projet ElectroCar","10h20 - 10h40" });
        matrixCursor.addRow(new Object[] { 5,"Pause","10h40 - 10h50" });
        matrixCursor.addRow(new Object[] { 6,"Projet Sondage","10h50 - 11h10" });
        matrixCursor.addRow(new Object[] { 7,"Projet Test","11h10 - 11h30" });
        matrixCursor.addRow(new Object[] { 8,"Projet Jalon","11h30 - 11h50" });

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
                if(position == 1 || position == 3 || position == 6)
                {
                    // Set a background color for ListView regular row/item
                    view.setBackgroundColor(Color.parseColor("#389f38"));
                }
                else if (position == 2)
                {
                    // Set the background color for alternate row/item
                    view.setBackgroundColor(Color.parseColor("#dddf1d"));
                }
                else if (position == 5 || position == 7)
                {
                    // Set the background color for alternate row/item
                    view.setBackgroundColor(Color.parseColor("#df1d1d"));
                }
                return view;
            }
        };

// ...qui va remplir l'objet ListView
        ListView lv = (ListView) findViewById(R.id.lv);
        lv.setOnItemClickListener(new AdapterView.OnItemClickListener(){
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                if(i == 1) {
                    Intent intent = new Intent(Planning.this, projet_desc.class);
                    intent.putExtra("NumJury", id);
                    startActivity(intent);
                }
                if(i==5 || i==7){
                    startActivity(new Intent(Planning.this, AjoutNote.class));
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
