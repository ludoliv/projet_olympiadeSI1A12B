package com.example.olivet.myapplication;

/**
 * Created by fdubois on 17/01/18.
 */

public class Juge {

    private int NumJury;
    private int NumGroupe;
    private int idHeure;

    // Constructeur
    public Juge(int numJ, int numG, int idH) {
        this.NumJury=numJ;
        this.NumGroupe=numG;
        this.idHeure=idH;
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

    public int getIdHeure() {
        return idHeure;
    }

    public void setIdHeure(int idHeure) {
        this.idHeure = idHeure;
    }
}
