package com.example.olivet.myapplication;


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONObject;

import java.lang.reflect.Array;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

/**
 * Created by olivet on 17/01/18.
 */

public class Recuperation_Envoi extends Activity{
    private EditText txtUsername;
    private EditText txtPassword;
    private Button buttonCo;
    private AccessServiceAPI m_ServiceAccess;
    private ProgressDialog m_ProgressDialog;


    @Override
    public void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.page_connexion);
        txtUsername=(EditText) findViewById(R.id.EditTextIdentifiant);
        txtPassword=(EditText) findViewById(R.id.editTextMotDePasse);
        m_ServiceAccess=new AccessServiceAPI();
        buttonCo= findViewById(R.id.button2);
        buttonCo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                btnLog(view);
            }
        });
    }

    public void btnLog(View v){
        if("".equals(txtUsername.getText().toString())){
            txtUsername.setError("Username is required!");
            return;
        }
        if("".equals(txtPassword.getText().toString())){
            txtPassword.setError("Password is required!");
            return;
        }
        /* TODO AsyncTask a appeler */
        new TaskLogin().execute(txtUsername.getText().toString(),txtPassword.getText().toString());
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data){
        super.onActivityResult(requestCode, resultCode, data);
        if(resultCode==1){
            txtUsername.setText(data.getStringExtra("username"));
            txtPassword.setText(data.getStringExtra("password"));
        }
    }

    public class TaskLogin extends AsyncTask<String, Void, Integer>{
        @Override
        public void onPreExecute(){
            super.onPreExecute();

            m_ProgressDialog=ProgressDialog.show(Recuperation_Envoi.this,"Veuillez patienter ...","En cours de chargement",true);
        }

        @Override
        public Integer doInBackground(String...params){
            Map<String, String> param=new HashMap<>();
            param.put("action","login");
            param.put("username",params[0]);
            param.put("password",params[1]);


            JSONObject jObjResult;
            try {

                jObjResult = m_ServiceAccess.convertJSONString2Obj(m_ServiceAccess.getJSONStringWithParam_POST(Donnees_BD.SERVICE_API_URL, param));
                //Ajout des données dans la base de donnée locale

                JuryManager juryManager=new JuryManager(getApplicationContext());
                juryManager.open();
                ArrayList<JSONObject> jurydonnees=(ArrayList<JSONObject>) jObjResult.get("Jury");
                for(int i=0;i<jurydonnees.size();i++){
                    Jury jury=new Jury(jurydonnees.get(i).getInt("id"),jurydonnees.get(i).getString("Login"),jurydonnees.get(i).getString("pwd"));
                    juryManager.addJury(jury);
                }
                juryManager.close();

                HeureManager heureManager=new HeureManager(getApplicationContext());
                heureManager.open();
                ArrayList<JSONObject> heuredonnees=(ArrayList<JSONObject>) jObjResult.get("Heures");
                for(int i=0;i<heuredonnees.size();i++){
                    Heure heure=new Heure(heuredonnees.get(i).getInt("idHeure"),heuredonnees.get(i).getString("hDeb"),heuredonnees.get(i).getString("hFin"));
                    heureManager.addHeure(heure);
                }
                heureManager.close();

                GroupeManager groupeManager=new GroupeManager(getApplicationContext());
                groupeManager.open();
                ArrayList<JSONObject> groupedonnees=(ArrayList<JSONObject>) jObjResult.get("Groupe");
                for(int i=0;i<groupedonnees.size();i++){
                    JSONObject groupeD=groupedonnees.get(i);
                    Groupe groupe=new Groupe(groupeD.getInt("NumGroupe"),groupeD.getString("NomProj"),groupeD.getString("Lycee"),groupeD.getString("image_Projet"));
                    groupeManager.addGroupe(groupe);
                }
                groupeManager.close();

                JugeManager jugeManager=new JugeManager(getApplicationContext());
                jugeManager.open();
                ArrayList<JSONObject> jugedonnees=(ArrayList<JSONObject>) jObjResult.get("relation");
                for(int i=0;i<jugedonnees.size();i++){
                    JSONObject jugeD=jugedonnees.get(i);
                    Juge juge=new Juge(jugeD.getInt("NumJury"),jugeD.getInt("NumGroupe"),jugeD.getInt("idHeure"));
                    jugeManager.addJuge(juge);
                }
                jugeManager.close();

                return jObjResult.getInt("result");
            } catch (Exception e) {
                return Donnees_BD.RESULT_ERROR;
            }
        }

        @Override
        public void onPostExecute(Integer res){
            super.onPostExecute(res);
            m_ProgressDialog.dismiss();

            if (Donnees_BD.RESULT_SUCCESS==res){
                Toast.makeText(getApplicationContext(), "Login Success", Toast.LENGTH_LONG).show();

                Intent i=new Intent(getApplicationContext(),MainActivity.class);
                startActivity(i);
            }
            else{
                Toast.makeText(getApplicationContext(),"Login Failed", Toast.LENGTH_LONG).show();
            }

        }

    }

}
