package com.example.olivet.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import static com.example.olivet.myapplication.JuryManager.KEY_LOGIN_;
import static com.example.olivet.myapplication.JuryManager.KEY_NUMJURY;

/**
 * Created by olivet on 21/12/17.
 */

public class Page_connexion extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.page_connexion);

        final EditText identifiant = (EditText)findViewById(R.id.EditTextIdentifiant);

        Button button = (Button)findViewById(R.id.button2);

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
                Intent i = new Intent(Page_connexion.this,Planning.class);
                JuryManager juryMan = new JuryManager(view.getContext());
                juryMan.open();
                Cursor jurys = juryMan.getJurys();
                int id = 0;
                while (jurys.moveToNext()) {
                    if (jurys.getString(jurys.getColumnIndex(KEY_LOGIN_)).equals(identifiant.getText().toString())) {
                        id = jurys.getInt(jurys.getColumnIndex(KEY_NUMJURY));
                    }
                }
                jurys.close();
                juryMan.close();
                i.putExtra("NumJury", id);
                startActivity(i);
            }
        });
    }
}
