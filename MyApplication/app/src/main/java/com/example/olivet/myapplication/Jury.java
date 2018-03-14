package com.example.olivet.myapplication;

/**
 * Created by schultz on 16/01/18.
 */

public class Jury {

    private int NumJury;
    private String login_;
    private String password_;

    // Constructeur
    public Jury(int num, String log, String pass) {
        this.NumJury=num;
        this.login_=log;
        this.password_=pass;
    }

    public int getNumJury() {
        return NumJury;
    }

    public void setNumJury(int num) {
        this.NumJury = num;
    }

    public String getLogin_() {
        return login_;
    }

    public void setLogin_(String log) {
        this.login_ = log;
    }

    public String getPassword_() {
        return password_;
    }

    public void setPassword_(String pass) {
        this.password_ = pass;
    }
}
