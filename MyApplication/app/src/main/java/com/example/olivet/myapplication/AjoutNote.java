package com.example.olivet.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;

/**
 * Created by schultz on 20/12/17.
 */

public class AjoutNote extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        requestWindowFeature(Window.FEATURE_NO_TITLE);

        setContentView(R.layout.ajouternote);

        final Spinner spinnerOri = (Spinner) findViewById(R.id.spinnerOriginalite);
        // Create an ArrayAdapter using the string array and a default spinner layout
        ArrayAdapter<CharSequence> adapterOri = ArrayAdapter.createFromResource(this,
                R.array.notes_array, android.R.layout.simple_spinner_item);
        // Specify the layout to use when the list of choices appears
        adapterOri.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        // Apply the adapter to the spinner
        spinnerOri.setAdapter(adapterOri);

        final Spinner spinnerProto = (Spinner) findViewById(R.id.spinnerProto);
        ArrayAdapter<CharSequence> adapterProto = ArrayAdapter.createFromResource(this,
                R.array.notes_array, android.R.layout.simple_spinner_item);
        adapterProto.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerProto.setAdapter(adapterProto);

        final Spinner spinnerDem = (Spinner) findViewById(R.id.spinnerDemarche);
        ArrayAdapter<CharSequence> adapterDem = ArrayAdapter.createFromResource(this,
                R.array.notes_array, android.R.layout.simple_spinner_item);
        adapterDem.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerDem.setAdapter(adapterDem);

        final Spinner spinnerPluri = (Spinner) findViewById(R.id.spinnerPluri);
        ArrayAdapter<CharSequence> adapterPluri = ArrayAdapter.createFromResource(this,
                R.array.notes_array, android.R.layout.simple_spinner_item);
        adapterPluri.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerPluri.setAdapter(adapterPluri);

        final Spinner spinnerMait = (Spinner) findViewById(R.id.spinnerMaitrise);
        ArrayAdapter<CharSequence> adapterMait = ArrayAdapter.createFromResource(this,
                R.array.notes_array, android.R.layout.simple_spinner_item);
        adapterMait.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerMait.setAdapter(adapterMait);

        final Spinner spinnerDevDur = (Spinner) findViewById(R.id.spinnerDevDurable);
        ArrayAdapter<CharSequence> adapterDevDur = ArrayAdapter.createFromResource(this,
                R.array.notes_array, android.R.layout.simple_spinner_item);
        adapterDevDur.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerDevDur.setAdapter(adapterDevDur);


        Button bsuppr = (Button) findViewById(R.id.buttonSuppr);
        bsuppr.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                spinnerOri.setSelection(0);
                spinnerProto.setSelection(0);
                spinnerDem.setSelection(0);
                spinnerPluri.setSelection(0);
                spinnerMait.setSelection(0);
                spinnerDevDur.setSelection(0);
            }
        });

        Button bABS = (Button) findViewById(R.id.buttonABS);
        bABS.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                spinnerOri.setSelection(1);
                spinnerProto.setSelection(1);
                spinnerDem.setSelection(1);
                spinnerPluri.setSelection(1);
                spinnerMait.setSelection(1);
                spinnerDevDur.setSelection(1);
            }
        });

        Button bValider = (Button) findViewById(R.id.buttonValider);
        bValider.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }
}
