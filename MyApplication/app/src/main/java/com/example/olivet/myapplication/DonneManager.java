package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

public class DonneManager {

    private static final String TABLE_NAME = "donne";
    public static final String KEY_NUMJURY="NumJury";
    public static final String KEY_NUMGROUPE="NumGroupe";
    public static final String KEY_IDNOTE="idNote";
    public static final String CREATE_TABLE_DONNE = "CREATE TABLE IF NOT EXISTS "+TABLE_NAME+
            " (" +
            " "+KEY_NUMJURY+" INTEGER, " +
            " "+KEY_NUMGROUPE+" INTEGER, " +
            " "+KEY_IDNOTE+" INTEGER, "+
            " "+ " FOREIGN KEY ("+KEY_NUMJURY+") REFERENCES JURY("+KEY_NUMJURY+")," +
            " "+ " FOREIGN KEY ("+KEY_NUMGROUPE+") REFERENCES GROUPE("+KEY_NUMGROUPE+")," +
            " "+ " FOREIGN KEY ("+KEY_IDNOTE+") REFERENCES NOTE("+KEY_IDNOTE+")," +
            " "+ " PRIMARY KEY ("+KEY_NUMJURY+","+KEY_NUMGROUPE+","+KEY_IDNOTE+")"+
            ");";
    private MySQLite maBaseSQLite; // notre gestionnaire du fichier SQLite
    private SQLiteDatabase db;

    // Constructeur
    public DonneManager(Context context)
    {
        maBaseSQLite = MySQLite.getInstance(context);
    }
    /**
     * Permet d'écrire dans la table Donne en l'ouvrant à l'écriture
     */
    public void open()
    {
        //on ouvre la table en lecture/écriture
        db = maBaseSQLite.getWritableDatabase();
    }
    /**
     * Permet de fermer la table Donne
     */
    public void close()
    {
        //on ferme l'accès à la BDD
        db.close();
    }
    /**
     * Permet d'ajouter une relation Donne dans la table
     * @param donne Donne
     * @return resultatInsert long
     */
    public long addDonne(Donne donne) {
        // Ajout d'un enregistrement dans la table

        ContentValues values = new ContentValues();
        values.put(KEY_NUMJURY, donne.getNumJury());
        values.put(KEY_NUMGROUPE, donne.getNumGroupe());
        values.put(KEY_IDNOTE, donne.getIdNote());

        // insert() retourne l'id du nouvel enregistrement inséré, ou -1 en cas d'erreur
        return db.insert(TABLE_NAME,null,values);
    }
    /**
     * Permet de modifier une relation Donne dans la table
     * @param donne Donne
     * @return resultatModif int
     */
    public int modDonne(Donne donne) {
        // modification d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la requête

        ContentValues values = new ContentValues();
        values.put(KEY_NUMJURY, donne.getNumJury());
        values.put(KEY_NUMGROUPE, donne.getNumGroupe());
        values.put(KEY_IDNOTE, donne.getIdNote());

        String where = KEY_NUMJURY+" = ? and "+KEY_NUMGROUPE+" = ? and "+KEY_IDNOTE+" = ?";
        String[] whereArgs = {donne.getNumJury()+"", donne.getNumGroupe()+"", donne.getIdNote()+""};

        return db.update(TABLE_NAME, values, where, whereArgs);
    }
    /**
     * Permet de supprimer une relation Donne dans la table
     * @param donne Donne
     * @return resultatSuppr int
     */
    public int supDonne(Donne donne) {
        // suppression d'un enregistrement
        // valeur de retour : (int) nombre de lignes affectées par la clause WHERE, 0 sinon

        String where = KEY_NUMJURY+" = ? and "+KEY_NUMGROUPE+" = ? and "+KEY_IDNOTE+" = ?";
        String[] whereArgs = {donne.getNumJury()+"", donne.getNumGroupe()+"", donne.getIdNote()+""};

        return db.delete(TABLE_NAME, where, whereArgs);
    }
    /**
     * Permet de récupérer une relation Donne dans la table
     * @param numj int
     * @param numg int
     * @param idN int
     * @return d Donne
     */
    public Donne getDonne(int numj, int numg, int idN) {
        // Retourne la donne dont l'id est passé en paramètre

        Donne d=new Donne(0,0,0);

        Cursor c = db.rawQuery("SELECT * FROM "+TABLE_NAME+" WHERE "+KEY_NUMJURY+"="+numj+" and "+KEY_NUMGROUPE+"="+numg+" and "+KEY_IDNOTE+"="+idN, null);
        if (c.moveToFirst()) {
            d.setNumJury(c.getInt(c.getColumnIndex(KEY_NUMJURY)));
            d.setNumGroupe(c.getInt(c.getColumnIndex(KEY_NUMGROUPE)));
            d.setIdNote(c.getInt(c.getColumnIndex(KEY_IDNOTE)));
            c.close();
        }

        return d;
    }
    /**
     * Permet de récupérer un idNote dans la table
     * @param numJ int
     * @param numG int
     * @return idN Cursor
     **/
    public Cursor getDonneIdNote(int numJ, int numG){
        return db.rawQuery("SELECT idNote FROM " + TABLE_NAME + " WHERE NumJury = " + numJ + " and NumGroupe = " + numG, null);
    }
    /**
     * Permet de récupérer les données des notes de la table Donne
     * @return note Cursor
     **/
    public Cursor getDonneNJNote(){
        return db.rawQuery("SELECT * FROM "+TABLE_NAME+" NATURAL JOIN note", null);
    }
    /**
     * Permet de récupérer l'ensemble des relations de la table Donne
     * @return donne Cursor
     **/
    public Cursor getDonnes() {
        // sélection de tous les enregistrements de la table
        return db.rawQuery("SELECT * FROM "+TABLE_NAME, null);
    }
}
