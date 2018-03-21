package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

public class JuryManager {

    private static final String TABLE_NAME = "jury";
    public static final String KEY_NUMJURY="NumJury";
    public static final String KEY_LOGIN_="login_";
    public static final String KEY_PASSWORD_="password_";
    public static final String CREATE_TABLE_JURY = "CREATE TABLE IF NOT EXISTS "+TABLE_NAME+
            " (" +
            " "+KEY_NUMJURY+" INTEGER primary key," +
            " "+KEY_LOGIN_+" TEXT," +
            " "+KEY_PASSWORD_+" TEXT "+
            ");";
    private MySQLite maBaseSQLite; // notre gestionnaire du fichier SQLite
    private SQLiteDatabase db;

    // Constructeur
    public JuryManager(Context context)
    {
        maBaseSQLite = MySQLite.getInstance(context);
    }
    /**
     * Permet d'écrire dans la table Jury en l'ouvrant à l'écriture
     */
    public void open()
    {
        //on ouvre la table en lecture/écriture
        db = maBaseSQLite.getWritableDatabase();
    }
    /**
     * Permet de fermer la table Jury
     */
    public void close()
    {
        //on ferme l'accès à la BDD
        db.close();
    }
    /**
     * Permet d'ajouter un Jury
     * @param jury Jury
     * @return resultatInsert long
     */
    public long addJury(Jury jury) {
        // Ajout d'un enregistrement dans la table

        ContentValues values = new ContentValues();
        values.put(KEY_NUMJURY, jury.getNumJury());
        values.put(KEY_LOGIN_, jury.getLogin_());
        values.put(KEY_PASSWORD_, jury.getPassword_());

        // insert() retourne l'id du nouvel enregistrement inséré, ou -1 en cas d'erreur
        return db.insert(TABLE_NAME,null,values);
    }

    /**
     * Permet de modifier un Jury
     * @param jury Jury
     * @return resultatMod int
     */
    public int modJury(Jury jury) {
        // modification d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la requête

        ContentValues values = new ContentValues();
        values.put(KEY_LOGIN_, jury.getLogin_());
        values.put(KEY_PASSWORD_, jury.getPassword_());

        String where = KEY_NUMJURY+" = ?";
        String[] whereArgs = {jury.getNumJury()+""};

        return db.update(TABLE_NAME, values, where, whereArgs);
    }
    /**
     * Permet de supprimer un jury
     * @param jury Jury
     * @return resultatSuppr int
     */
    public int supJury(Jury jury) {
        // suppression d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la clause WHERE, 0 sinon

        String where = KEY_NUMJURY+" = ?";
        String[] whereArgs = {jury.getNumJury()+""};

        return db.delete(TABLE_NAME, where, whereArgs);
    }
    /**
     * Permet de récupérer un jury en fonction de son id
     * @param num int
     * @return j Jury
     */
    public Jury getJury(int num) {
        // Retourne le jury dont l'id est passé en paramètre

        Jury j=new Jury(0,"","");

        Cursor c = db.rawQuery("SELECT * FROM "+TABLE_NAME+" WHERE "+KEY_NUMJURY+"="+num, null);
        if (c.moveToFirst()) {
            j.setNumJury(c.getInt(c.getColumnIndex(KEY_NUMJURY)));
            j.setLogin_(c.getString(c.getColumnIndex(KEY_LOGIN_)));
            j.setPassword_(c.getString(c.getColumnIndex(KEY_PASSWORD_)));
            c.close();
        }

        return j;
    }
    /**
     * Permet de récupérer l'ensemble des jurys dans la table
     * @return curseur Cursor
     */
    public Cursor getJurys() {
        // sélection de tous les enregistrements de la table
        return db.rawQuery("SELECT * FROM "+TABLE_NAME, null);
    }

} // class JuryManager
