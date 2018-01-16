package com.example.olivet.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.MatrixCursor;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.SimpleCursorAdapter;

/**
 * Created by fdubois on 11/01/18.
 */

public class projet_desc extends Activity {
    @Override
    protected void onCreate(Bundle saveInstanceState){
        super.onCreate(saveInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        setContentView(R.layout.projet_desc);

        Button buttonSupprNotes = (Button)findViewById(R.id.buttonSupprimer);
        buttonSupprNotes.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                new AlertDialog.Builder(view.getContext())
                        .setIcon(android.R.drawable.ic_dialog_alert)
                        .setTitle("Supprimer les notes")
                        .setMessage("Voulez-vous vraiment supprimer toutes les notes de ce projet?")
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

        Button buttonModifNotes = (Button)findViewById(R.id.buttonModifier);
        buttonModifNotes.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
                startActivity(new Intent(projet_desc.this, AjoutNote.class));
            }
        });

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
        matrixCursor.addRow(new Object[] { 1,"Originalité","4" });
        matrixCursor.addRow(new Object[] { 2,"Prototype","3" });
        matrixCursor.addRow(new Object[] { 3,"Démarche SI","1" });
        matrixCursor.addRow(new Object[] { 4,"Pluridisciplinarité","3" });
        matrixCursor.addRow(new Object[] { 5,"Maîtrise","5" });
        matrixCursor.addRow(new Object[] { 6,"Développement Durable","0" });

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
                return view;
            }
        };

// ...qui va remplir l'objet ListView
        ListView lv = (ListView) findViewById(R.id.lv);
        lv.setAdapter(adapter);
    }


}
