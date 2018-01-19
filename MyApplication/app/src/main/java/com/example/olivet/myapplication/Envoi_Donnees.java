package com.example.olivet.myapplication;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.database.Cursor;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.view.View.OnClickListener;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class Envoi_Donnees extends Activity {

    TextView textProgress;
    private ProgressDialog m_ProgressDialog;
    private AccessServiceAPI m_ServiceAccess;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.envoi_donnees);

        textProgress = (TextView) findViewById(R.id.textProgress);
        new TaskEnvoi();

    }

    public class TaskEnvoi extends AsyncTask<String,Void,Integer>{
        @Override
        public void onPreExecute(){
            super.onPreExecute();

            m_ProgressDialog= ProgressDialog.show(Envoi_Donnees.this,"Veuillez patienter ...","En cours de chargement",true);
        }
        @Override
        public Integer doInBackground(String...params){
            NoteManager noteManager=new NoteManager(getApplicationContext());
            DonneManager donneManager=new DonneManager(getApplicationContext());

            HashMap<String, ArrayList<HashMap<String, Object>>> dico_des_donnees=new HashMap<>();
            Cursor cursornote=noteManager.getNotes();
            ArrayList<HashMap<String,Object>> listeNotes=new ArrayList<>();
            while(cursornote.moveToNext()){
                HashMap<String, Object> note=new HashMap<>();
                note.put("idNote",cursornote.getColumnIndex("idNote"));
                note.put("prototype",cursornote.getColumnIndex("prototype"));
                note.put("originalite",cursornote.getColumnIndex("originalite"));
                note.put("demarcheSI",cursornote.getColumnIndex("demarcheSI"));
                note.put("pluriDisciplinarite",cursornote.getColumnIndex("pluriDisciplinarite"));
                note.put("maitrise",cursornote.getColumnIndex("maitrise"));
                note.put("devDurable",cursornote.getColumnIndex("devDurable"));
                listeNotes.add(note);
            }
            dico_des_donnees.put("Note",listeNotes);

            Cursor cursordonne=donneManager.getDonnes();
            ArrayList<HashMap<String,Object>> listeDonne=new ArrayList<>();
            while(cursordonne.moveToNext()){
                HashMap<String, Object> donne=new HashMap<>();
                donne.put("NumJury",cursordonne.getColumnIndex("NumJury"));
                donne.put("NumGroupe",cursordonne.getColumnIndex("NumGroupe"));
                donne.put("idNote",cursordonne.getColumnIndex("idNote"));
                listeDonne.add(donne);
            }
            dico_des_donnees.put("Donne",listeDonne);

            JSONObject jObjResult;

            try {
                jObjResult = m_ServiceAccess.convertJSONString2Obj(m_ServiceAccess.getJSONStringWithParam_POST2(Donnees_BD.ENVOI_URL, dico_des_donnees));
                return jObjResult.getInt("resultat");
            } catch (Exception e){
                return Donnees_BD.RESULT_ERROR;
            }


        }
        @Override
        public void onPostExecute(Integer res){
            super.onPostExecute(res);
            m_ProgressDialog.dismiss();

            if (Donnees_BD.RESULT_SUCCESS==res){
                Toast.makeText(getApplicationContext(), "Données envoyés", Toast.LENGTH_LONG).show();

                Intent i=new Intent(getApplicationContext(),MainActivity.class);
                startActivity(i);
            }
            else{
                Toast.makeText(getApplicationContext(),"Données Fail", Toast.LENGTH_LONG).show();

                Intent i=new Intent(getApplicationContext(),MainActivity.class);
                startActivity(i);
            }

        }
    }
}
