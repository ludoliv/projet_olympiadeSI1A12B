package com.example.olivet.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.view.View.OnClickListener;

public class Envoi_Donnees extends Activity {

    ProgressBar simpleProgressBar;
    TextView textProgress;
    int valProgress;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.envoi_donnees);

        textProgress = (TextView) findViewById(R.id.textProgress);

        simpleProgressBar=(ProgressBar)findViewById(R.id.progressBar2);
        int progressValue=simpleProgressBar.getProgress();
        textProgress.setText(progressValue + "%");
    }
}
