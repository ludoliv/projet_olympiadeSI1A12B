package com.example.olivet.myapplication;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

/**
 * Created by fdubois on 17/01/18.
 */

public class JugeManager {


    private static final String TABLE_NAME = "juge";
    public static final String KEY_NUMJURY="NumJury";
    public static final String KEY_NUMGROUPE="NumGroupe";
    public static final String KEY_IDHEURE="idHeure";
    public static final String CREATE_TABLE_JUGE = "CREATE TABLE IF NOT EXISTS "+TABLE_NAME+
            " (" +
            " "+KEY_NUMJURY+" INTEGER, " +
            " "+KEY_NUMGROUPE+" INTEGER, " +
            " "+KEY_IDHEURE+" INTEGER, "+
            " "+ " FOREIGN KEY ("+KEY_NUMJURY+") REFERENCES JURY("+KEY_NUMJURY+")," +
            " "+ " FOREIGN KEY ("+KEY_NUMGROUPE+") REFERENCES GROUPE("+KEY_NUMGROUPE+")," +
            " "+ " FOREIGN KEY ("+KEY_IDHEURE+") REFERENCES HEURE("+KEY_IDHEURE+")," +
            " "+ " PRIMARY KEY ("+KEY_NUMJURY+","+KEY_NUMGROUPE+","+KEY_IDHEURE+")"+
            ");";
    private MySQLite maBaseSQLite; // notre gestionnaire du fichier SQLite
    private SQLiteDatabase db;

    // Constructeur
    public JugeManager(Context context)
    {
        maBaseSQLite = MySQLite.getInstance(context);
    }

    public void open()
    {
        //on ouvre la table en lecture/écriture
        db = maBaseSQLite.getWritableDatabase();
    }

    public void close()
    {
        //on ferme l'accès à la BDD
        db.close();
    }

    public long addJuge(Juge juge) {
        // Ajout d'un enregistrement dans la table

        ContentValues values = new ContentValues();
        values.put(KEY_NUMJURY, juge.getNumJury());
        values.put(KEY_NUMGROUPE, juge.getNumGroupe());
        values.put(KEY_IDHEURE, juge.getIdHeure());

        // insert() retourne l'id du nouvel enregistrement inséré, ou -1 en cas d'erreur
        return db.insert(TABLE_NAME,null,values);
    }

    public int modJuge(Juge juge) {
        // modification d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la requête

        ContentValues values = new ContentValues();
        values.put(KEY_NUMJURY, juge.getNumJury());
        values.put(KEY_NUMGROUPE, juge.getNumGroupe());
        values.put(KEY_IDHEURE, juge.getIdHeure());

        String where = KEY_NUMJURY+" = ? and "+KEY_NUMGROUPE+" = ? and "+KEY_IDHEURE+" = ?";
        String[] whereArgs = {juge.getNumJury()+"", juge.getNumGroupe()+"", juge.getIdHeure()+""};

        return db.update(TABLE_NAME, values, where, whereArgs);
    }

    public int supJuge(Juge juge) {
        // suppression d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la clause WHERE, 0 sinon

        String where = KEY_NUMJURY+" = ? and "+KEY_NUMGROUPE+" = ? and "+KEY_IDHEURE+" = ?";
        String[] whereArgs = {juge.getNumJury()+"", juge.getNumGroupe()+"", juge.getIdHeure()+""};

        return db.delete(TABLE_NAME, where, whereArgs);
    }

    public Juge getJuge(int numj, int numg, int idH) {
        // Retourne le juge dont l'id est passé en paramètre

        Juge j=new Juge(0,0,0);

        Cursor c = db.rawQuery("SELECT * FROM "+TABLE_NAME+" WHERE "+KEY_NUMJURY+"="+numj+" and "+KEY_NUMGROUPE+"="+numg+" and "+KEY_IDHEURE+"="+idH, null);
        if (c.moveToFirst()) {
            j.setNumJury(c.getInt(c.getColumnIndex(KEY_NUMJURY)));
            j.setNumGroupe(c.getInt(c.getColumnIndex(KEY_NUMGROUPE)));
            j.setIdHeure(c.getInt(c.getColumnIndex(KEY_IDHEURE)));
            c.close();
        }

        return j;
    }

    public Cursor getJuges() {
        // sélection de tous les enregistrements de la table
        return db.rawQuery("SELECT * FROM "+TABLE_NAME, null);
    }

    public Cursor getNaturalJoinJuge() {

        return db.rawQuery("SELECT * FROM "+TABLE_NAME+" natural join Jury natural join Groupe natural join Heure", null);
    }
}
