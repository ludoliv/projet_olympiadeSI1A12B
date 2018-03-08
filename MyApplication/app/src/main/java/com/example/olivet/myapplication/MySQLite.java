package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by olivet on 16/01/18.
 */

public class MySQLite extends SQLiteOpenHelper {

        private static final String DATABASE_NAME = "db.sqlite";
        private static final int DATABASE_VERSION = 1;
        private static MySQLite sInstance;

        public static synchronized MySQLite getInstance(Context context) {
            if (sInstance == null) { sInstance = new MySQLite(context); }
            return sInstance;
        }

        private MySQLite(Context context) {
            super(context, DATABASE_NAME, null, DATABASE_VERSION);
        }

        @Override
        public void onCreate(SQLiteDatabase sqLiteDatabase) {
            // Création de la base de données
            // on exécute ici les requêtes de création des tables
            sqLiteDatabase.execSQL(GroupeManager.CREATE_TABLE_GROUPE);
            sqLiteDatabase.execSQL(JuryManager.CREATE_TABLE_JURY);
            sqLiteDatabase.execSQL(NoteManager.CREATE_TABLE_NOTE);
            sqLiteDatabase.execSQL(DonneManager.CREATE_TABLE_DONNE);
            sqLiteDatabase.execSQL(HeureManager.CREATE_TABLE_HEURE);
            sqLiteDatabase.execSQL(JugeManager.CREATE_TABLE_JUGE);
        }

        @Override
        public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i2) {
            // Mise à jour de la base de données
            // méthode appelée sur incrémentation de DATABASE_VERSION
            // on peut faire ce qu'on veut ici, comme recréer la base :
            if (i<i2) {
                onCreate(sqLiteDatabase);
            }
        }

    } // class MySQLite
