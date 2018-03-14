package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

public class Donne {

    private int NumJury;
    private int NumGroupe;
    private int idNote;

    // Constructeur
    public Donne(int numJ, int numG, int idN) {
        this.NumJury=numJ;
        this.NumGroupe=numG;
        this.idNote=idN;
    }

    public int getNumJury() {
        return NumJury;
    }

    public void setNumJury(int numJury) {
        NumJury = numJury;
    }

    public int getNumGroupe() {
        return NumGroupe;
    }

    public void setNumGroupe(int numGroupe) {
        NumGroupe = numGroupe;
    }

    public int getIdNote() {
        return idNote;
    }

    public void setIdNote(int idNote) {
        this.idNote = idNote;
    }
}
