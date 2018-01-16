package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

public class Heure {

    private int idHeure;
    private String hDeb;
    private String hFin;

    // Constructeur
    public Heure(int id, String deb, String fin) {
        this.idHeure=id;
        this.hDeb=deb;
        this.hFin=fin;
    }

    public int getIdHeure() {
        return idHeure;
    }

    public void setIdHeure(int idHeure) {
        this.idHeure = idHeure;
    }

    public String gethDeb() {
        return hDeb;
    }

    public void sethDeb(String hDeb) {
        this.hDeb = hDeb;
    }

    public String gethFin() {
        return hFin;
    }

    public void sethFin(String hFin) {
        this.hFin = hFin;
    }
}
