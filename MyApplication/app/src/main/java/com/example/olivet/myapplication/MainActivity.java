package com.example.olivet.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;

public class MainActivity extends Activity {
    Button buttonConsulter;
    Button buttonEnvoie;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        buttonEnvoie = (Button)findViewById(R.id.buttonEnvoie);
        buttonEnvoie.setEnabled(false);
        buttonEnvoie.setBackgroundColor(Color.WHITE);
        buttonEnvoie.setTextColor(Color.GRAY);
        buttonEnvoie.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this,Envoi_Donnees.class));
            }
        });
        //buttonEnvoie.setEnabled(false);
        buttonEnvoie.setBackgroundColor(Color.WHITE);
        buttonEnvoie.setTextColor(Color.GRAY);

        buttonConsulter = (Button)findViewById(R.id.buttonConsulter);
        buttonConsulter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                view.getContext().deleteDatabase("db.sqlite");

                //A DELETE
                JuryManager juryMan = new JuryManager(view.getContext());
                juryMan.open();
                Jury jury12 = new Jury(12, "Martin", "banane");
                Jury jury23 = new Jury(23, "Florian", "abricot");
                juryMan.addJury(jury12);
                juryMan.addJury(jury23);
                juryMan.close();

                GroupeManager grpMan = new GroupeManager(view.getContext());
                grpMan.open();
                Groupe paul = new Groupe(1, "STMG", "Paul", "Claude de France a Romorantin", "bite.png");
                Groupe fred = new Groupe(2, "STMG", "Fred", "Claude de France a Romorantin", "alcool.png");
                Groupe herbert = new Groupe(3, "STMG", "Herbert", "Claude de France a Romorantin", "bite.png");
                Groupe apresPause = new Groupe(4, "STMG", "Après-Pause", "Claude de France a Romorantin", "bite.png");
                grpMan.addGroupe(paul);
                grpMan.addGroupe(fred);
                grpMan.addGroupe(herbert);
                grpMan.addGroupe(apresPause);
                grpMan.close();

                HeureManager hMan = new HeureManager(view.getContext());
                hMan.open();
                Heure creneau1 = new Heure(1, "9h40", "10h00");
                Heure creneau2 = new Heure(2, "10h10", "10h20");
                Heure creneau3 = new Heure(3, "10h20", "10h40");
                Heure creneau4 = new Heure(4, "11h10", "11h30");
                hMan.addHeure(creneau1);
                hMan.addHeure(creneau2);
                hMan.addHeure(creneau3);
                hMan.addHeure(creneau4);
                hMan.close();

                JugeManager jMan = new JugeManager(view.getContext());
                jMan.open();
                Juge juge1 = new Juge(12, 1, 1);
                Juge juge2 = new Juge(12, 2, 2);
                Juge juge3 = new Juge(12, 3, 3);
                Juge juge4 = new Juge(12, 4, 4);
                jMan.addJuge(juge1);
                jMan.addJuge(juge2);
                jMan.addJuge(juge3);
                jMan.addJuge(juge4);
                jMan.close();

                NoteManager noteMan = new NoteManager(view.getContext());
                noteMan.open();
                Note note1 = new Note(1, 5, 4, 3, 2, 1, 0);
                Note note2 = new Note(2, 0, 1, 2, 3, 4, 5);
                Note note3 = new Note(3, 0, 0, 0, 0, 0, 0);
                noteMan.addNote(note1);
                noteMan.addNote(note2);
                noteMan.addNote(note3);
                noteMan.close();

                DonneManager donMan = new DonneManager(view.getContext());
                donMan.open();
                Donne donne1 = new Donne(12, 1, 1);
                Donne donne2 = new Donne(12, 2, 2);
                Donne donne3 = new Donne(12, 3, 3);
                donMan.addDonne(donne1);
                donMan.addDonne(donne2);
                donMan.addDonne(donne3);
                //A PLUS DELETE


                startActivity(new Intent(MainActivity.this,Page_connexion.class));
            }
        });
    }






}
