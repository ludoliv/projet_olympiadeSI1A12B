package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

public class HeureManager {

    private static final String TABLE_NAME = "heure";
    public static final String KEY_IDHEURE="idHeure";
    public static final String KEY_HDEB="hDeb";
    public static final String KEY_HFIN="hFin";
    public static final String CREATE_TABLE_HEURE = "CREATE TABLE IF NOT EXISTS "+TABLE_NAME+
            " (" +
            " "+KEY_IDHEURE+" INTEGER primary key," +
            " "+KEY_HDEB+" TEXT," +
            " "+KEY_HFIN+" TEXT "+
            ");";
    private MySQLite maBaseSQLite; // notre gestionnaire du fichier SQLite
    private SQLiteDatabase db;

    // Constructeur
    public HeureManager(Context context)
    {
        maBaseSQLite = MySQLite.getInstance(context);
    }
    /**
     * Permet d'écrire dans la table Heure en l'ouvrant à l'écriture
     */
    public void open()
    {
        //on ouvre la table en lecture/écriture
        db = maBaseSQLite.getWritableDatabase();
    }
    /**
     * Permet de fermer la table Heure à l'écriture
     */
    public void close()
    {
        //on ferme l'accès à la BDD
        db.close();
    }
    /**
     * Permet d'ajouter une heure dans la table
     * @param heure Heure
     * @return resultatInsert long
     */
    public long addHeure(Heure heure) {
        // Ajout d'un enregistrement dans la table

        ContentValues values = new ContentValues();
        values.put(KEY_HDEB, heure.gethDeb());
        values.put(KEY_HFIN, heure.gethFin());

        // insert() retourne l'id du nouvel enregistrement inséré, ou -1 en cas d'erreur
        return db.insert(TABLE_NAME,null,values);
    }
    /**
     * Permet de modifier une heure dans la table
     * @param heure Heure
     * @return resultatModif int
     */
    public int modHeure(Heure heure) {
        // modification d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la requête

        ContentValues values = new ContentValues();
        values.put(KEY_HDEB, heure.gethDeb());
        values.put(KEY_HFIN, heure.gethFin());

        String where = KEY_IDHEURE+" = ?";
        String[] whereArgs = {heure.getIdHeure()+""};

        return db.update(TABLE_NAME, values, where, whereArgs);
    }
    /**
     * Permet de supprimer une heure dans la table
     * @param heure Heure
     * @return resultatSuppr int
     */
    public int supHeure(Heure heure) {
        // suppression d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la clause WHERE, 0 sinon

        String where = KEY_IDHEURE+" = ?";
        String[] whereArgs = {heure.getIdHeure()+""};

        return db.delete(TABLE_NAME, where, whereArgs);
    }
    /**
     * Permet de récupérer une heure dans la table
     * @param id int
     * @return h Heure
     */
    public Heure getHeure(int id) {
        // Retourne l'animal dont l'id est passé en paramètre

        Heure h=new Heure(0,"","");

        Cursor c = db.rawQuery("SELECT * FROM "+TABLE_NAME+" WHERE "+KEY_IDHEURE+"="+id, null);
        if (c.moveToFirst()) {
            h.setIdHeure(c.getInt(c.getColumnIndex(KEY_IDHEURE)));
            h.sethDeb(c.getString(c.getColumnIndex(KEY_HDEB)));
            h.sethFin(c.getString(c.getColumnIndex(KEY_HFIN)));
            c.close();
        }

        return h;
    }
    /**
     * Permet de récupérer toutes les heures dans la table
     * @return curseurH Cursor
     */
    public Cursor getHeures() {
        // sélection de tous les enregistrements de la table
        return db.rawQuery("SELECT * FROM "+TABLE_NAME, null);
    }
}
