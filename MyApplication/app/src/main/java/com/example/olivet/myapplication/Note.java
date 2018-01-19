package com.example.olivet.myapplication;

/**
 * Created by fdubois on 16/01/18.
 */

public class Note {

    private Integer idNote;
    private Integer prototype;
    private Integer originalite;
    private Integer demarcheSI;
    private Integer pluriDisciplinarite;
    private Integer maitrise;
    private Integer devDurable;

    // Constructeur
    public Note(Integer idNote, Integer prototype, Integer originalite, Integer demarcheSI, Integer pluriDisciplinarite, Integer maitrise, Integer devDurable) {
        this.idNote=idNote;
        this.prototype=prototype;
        this.originalite=originalite;
        this.demarcheSI=demarcheSI;
        this.pluriDisciplinarite=pluriDisciplinarite;
        this.maitrise=maitrise;
        this.devDurable=devDurable;
    }

    public Integer getIdNote() {
        return idNote;
    }

    public void setIdNote(Integer id) {
        this.idNote = idNote;
    }

    public Integer getOriginalite() {
        return originalite;
    }

    public void setOriginalite(Integer originalite) {
        this.originalite = originalite;
    }

    public Integer getPrototype() {
        return prototype;
    }

    public void setPrototype(Integer prototype) {
        this.prototype = prototype;
    }

    public Integer getDemarcheSI() {
        return demarcheSI;
    }

    public void setDemarcheSI(Integer demarcheSI) {
        this.demarcheSI = demarcheSI;
    }

    public Integer getPluriDisciplinarite() {
        return pluriDisciplinarite;
    }

    public void setPluriDisciplinarite(Integer pluriDisciplinarite) {
        this.pluriDisciplinarite = pluriDisciplinarite;
    }

    public Integer getMaitrise() {
        return maitrise;
    }

    public void setMaitrise(Integer maitrise) {
        this.maitrise = maitrise;
    }

    public Integer getDevDurable() {
        return devDurable;
    }

    public void setDevDurable(Integer devDurable) {
        this.devDurable = devDurable;
    }
}