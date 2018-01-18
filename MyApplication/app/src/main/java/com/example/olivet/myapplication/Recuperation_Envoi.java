package com.example.olivet.myapplication;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;

/**
 * Created by olivet on 17/01/18.
 */

public class Recuperation_Envoi {

    public void Recup() {
        URL url = null;
        try {
            url = new URL("127.0.0.1/recup.php");
            HttpURLConnection connexion = (HttpURLConnection) url.openConnection();
            connexion.setRequestMethod("GET");
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e){
            e.printStackTrace();
        }
    }
    public static String post(String adresse, String donnees){
        String a="";
        int idex=0;
        OutputStreamWriter writer = null;
        BufferedReader reader = null;
        try {
            a = "";
            //création de la connection
            URL url = new URL(adresse);
            URLConnection conn = url.openConnection();
            conn.setDoOutput(true);
            // System.out.println(conn.getURL());
            //envoi de la requête
            writer = new OutputStreamWriter(conn.getOutputStream());
            writer.write(donnees);
            writer.flush();
            //lecture de la réponse
            reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
            String ligne;
            while ((ligne = reader.readLine()) != null) {
                a += ligne;
            }

        }catch (Exception e) {
            e.printStackTrace();
        }finally{
            try{writer.close();}catch(Exception e){}
            try{reader.close();}catch(Exception e){}
        }
        return a;
    }
}
