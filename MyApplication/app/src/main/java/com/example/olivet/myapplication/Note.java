package com.example.olivet.myapplication;

/**
 * Created by fdubois on 16/01/18.
 */

public class Note {

    private int idNote;
    private int prototype;
    private int originalite;
    private int demarcheSI;
    private int pluriDisciplinarite;
    private int maitrise;
    private int devDurable;

    // Constructeur
    public Note(int idNote, int prototype, int originalite, int demarcheSI, int pluriDisciplinarite, int maitrise, int devDurable) {
        this.idNote=idNote;
        this.prototype=prototype;
        this.originalite=originalite;
        this.demarcheSI=demarcheSI;
        this.pluriDisciplinarite=pluriDisciplinarite;
        this.maitrise=maitrise;
        this.devDurable=devDurable;
    }

    public int getIdNote() {
        return idNote;
    }

    public void setIdNote(int id) {
        this.idNote = idNote;
    }

    public int getOriginalite() {
        return originalite;
    }

    public void setOriginalite(int originalite) {
        this.originalite = originalite;
    }

    public int getPrototype() {
        return prototype;
    }

    public void setPrototype(int prototype) {
        this.prototype = prototype;
    }

    public int getDemarcheSI() {
        return demarcheSI;
    }

    public void setDemarcheSI(int demarcheSI) {
        this.demarcheSI = demarcheSI;
    }

    public int getPluriDisciplinarite() {
        return pluriDisciplinarite;
    }

    public void setPluriDisciplinarite(int pluriDisciplinarite) {
        this.pluriDisciplinarite = pluriDisciplinarite;
    }

    public int getMaitrise() {
        return maitrise;
    }

    public void setMaitrise(int maitrise) {
        this.maitrise = maitrise;
    }

    public int getDevDurable() {
        return devDurable;
    }

    public void setDevDurable(int devDurable) {
        this.devDurable = devDurable;
    }
}