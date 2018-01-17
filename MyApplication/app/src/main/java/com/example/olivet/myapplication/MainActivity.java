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
    Button button;
    Button buttonEnvoie;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        button = (Button)findViewById(R.id.button);
        button.setEnabled(false);
        button.setBackgroundColor(Color.WHITE);
        button.setTextColor(Color.GRAY);

        Button buttonEnvoie = (Button)findViewById(R.id.buttonEnvoie);
        buttonEnvoie.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this,Envoi_Donnees.class));
            }
        });
        //buttonEnvoie.setEnabled(false);
        buttonEnvoie.setBackgroundColor(Color.WHITE);
        buttonEnvoie.setTextColor(Color.GRAY);


        Button buttonConsulter = (Button)findViewById(R.id.buttonConsulter);
        buttonConsulter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                JuryManager juryMan = new JuryManager(view.getContext());
                juryMan.open();
                Jury jury12 = new Jury(12, "Martin", "banane");
                Jury jury23 = new Jury(23, "Florian", "abricot");
                juryMan.addJury(jury12);
                juryMan.addJury(jury23);
                juryMan.close();
                startActivity(new Intent(MainActivity.this,Page_connexion.class));
            }
        });
    }






}
