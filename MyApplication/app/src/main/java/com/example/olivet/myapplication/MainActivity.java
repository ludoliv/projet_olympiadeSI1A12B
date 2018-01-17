package com.example.olivet.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Color;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.wifi.WifiManager;
import android.os.Bundle;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;

import java.io.File;

public class MainActivity extends Activity {
    Button buttonConsulter;
    Button buttonEnvoie;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        buttonEnvoie = (Button)findViewById(R.id.buttonEnvoie);
        buttonConsulter = (Button)findViewById(R.id.buttonConsulter);
        File f=new File("/data/data/com.example.olivet.myapplication/databases/db.sqlite");

        buttonEnvoie.setEnabled(false);
        buttonEnvoie.setBackgroundColor(Color.WHITE);
        buttonEnvoie.setTextColor(Color.GRAY);
        ConnectivityManager connManager = (ConnectivityManager) getSystemService(this.CONNECTIVITY_SERVICE);
        NetworkInfo mWifi = connManager.getNetworkInfo(ConnectivityManager.TYPE_WIFI);
        if(mWifi.isConnected()){
            buttonConsulter.setEnabled(true);
            buttonConsulter.setBackgroundColor(Color.GRAY);
            buttonConsulter.setTextColor(Color.BLACK);
            if(f.exists() && !f.isDirectory()){
                buttonEnvoie.setEnabled(true);
                buttonEnvoie.setBackgroundColor(Color.GRAY);
                buttonEnvoie.setTextColor(Color.BLACK);
            }


        }
        else {
            if(f.exists() && !f.isDirectory()){
                buttonConsulter.setEnabled(true);
                buttonConsulter.setBackgroundColor(Color.GRAY);
                buttonConsulter.setTextColor(Color.BLACK);
            }
            else {
                buttonConsulter.setEnabled(false);
                buttonConsulter.setBackgroundColor(Color.WHITE);
                buttonConsulter.setTextColor(Color.GRAY);
            }
        }


        buttonEnvoie.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this,Envoi_Donnees.class));
            }
        });

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
                grpMan.addGroupe(paul);
                grpMan.addGroupe(fred);
                grpMan.addGroupe(herbert);
                grpMan.close();

                HeureManager hMan = new HeureManager(view.getContext());
                hMan.open();
                Heure creneau1 = new Heure(1, "9h40", "10h00");
                Heure creneau2 = new Heure(2, "10h00", "10h20");
                Heure creneau3 = new Heure(3, "10h20", "10h40");
                hMan.addHeure(creneau1);
                hMan.addHeure(creneau2);
                hMan.addHeure(creneau3);
                hMan.close();

                JugeManager jMan = new JugeManager(view.getContext());
                jMan.open();
                Juge juge1 = new Juge(12, 1, 1);
                Juge juge2 = new Juge(12, 2, 2);
                Juge juge3 = new Juge(12, 3, 3);
                jMan.addJuge(juge1);
                jMan.addJuge(juge2);
                jMan.addJuge(juge3);
                jMan.close();
                //A PLUS DELETE


                startActivity(new Intent(MainActivity.this,Page_connexion.class));
            }
        });
    }






}
