package com.example.olivet.myapplication;

/**
 * Created by olivet on 16/01/18.
 */

public class Groupe {
    private int id_groupe;
    private String filiere;
    private String nom_projet;
    private String lycee;
    private String image;

    Groupe(int id,String filiere, String nom_projet, String lycee, String image){
        this.id_groupe=id;
        this.filiere=filiere;
        this.nom_projet=nom_projet;
        this.lycee=lycee;
        this.image=image;

    }

    public int getId_groupe() {
        return id_groupe;
    }

    public String getFiliere() {
        return filiere;
    }

    public String getNom_projet() {
        return nom_projet;
    }


    public String getLycee() {
        return lycee;
    }


    public String getImage() {
        return image;
    }

    public void setId_groupe(int id_groupe) {
        this.id_groupe = id_groupe;
    }

    public void setFiliere(String filiere) {
        this.filiere = filiere;
    }

    public void setNom_projet(String nom_projet) {
        this.nom_projet = nom_projet;
    }

    public void setLycee(String lycee) {
        this.lycee = lycee;
    }

    public void setImage(String image) {
        this.image = image;
    }
}
