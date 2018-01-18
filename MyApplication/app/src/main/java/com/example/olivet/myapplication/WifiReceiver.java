package com.example.olivet.myapplication;

import android.app.Activity;
import android.app.ActivityManager;
import android.content.BroadcastReceiver;
import android.content.ComponentName;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.net.NetworkInfo;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.view.View;

import java.io.File;
import java.lang.reflect.Field;
import java.lang.reflect.InvocationTargetException;
import java.util.Map;

/**
 * Created by olivet on 16/01/18.
 */

public class WifiReceiver extends BroadcastReceiver {

    private static Activity getForegroundActivity(){
        Activity activity = null;
        try {
            Class activityThreadClass = Class.forName("android.app.ActivityThread");
            Object activityThread = activityThreadClass.getMethod("currentActivityThread").invoke(null);
            Field activitiesField = activityThreadClass.getDeclaredField("mActivities");
            activitiesField.setAccessible(true);
            Map<Object, Object> activities = (Map<Object, Object>) activitiesField.get(activityThread);

            if(activities == null)
                return null;

            for(Object activityRecord:activities.values()){
                Class activityRecordClass = activityRecord.getClass();
                Field pausedField = activityRecordClass.getDeclaredField("paused");
                pausedField.setAccessible(true);
                if(!pausedField.getBoolean(activityRecord)) {
                    Field activityField = activityRecordClass.getDeclaredField("activity");
                    activityField.setAccessible(true);
                    activity = (Activity) activityField.get(activityRecord);
                    return activity;
                }
            }
        } catch (InvocationTargetException e) {
            e.printStackTrace();
        } catch (NoSuchMethodException e) {
            e.printStackTrace();
        } catch (IllegalAccessException e) {
            e.printStackTrace();
        } catch (NoSuchFieldException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
        return activity;}

    @Override
    public void onReceive(Context context, Intent intent) {

        NetworkInfo info = intent.getParcelableExtra(WifiManager.EXTRA_NETWORK_INFO);
        File f=new File("/data/data/com.example.olivet.myapplication/databases/db.sqlite");
        Activity act=getForegroundActivity();
        if(info != null && info.isConnected()) {

            if (act instanceof MainActivity){
                ((MainActivity) act).buttonConsulter.setEnabled(true);
                ((MainActivity) act).buttonConsulter.setBackgroundColor(Color.GRAY);
                ((MainActivity) act).buttonConsulter.setTextColor(Color.BLACK);
                if(f.exists() && !f.isDirectory()){
                    ((MainActivity) act).buttonEnvoie.setEnabled(true);
                    ((MainActivity) act).buttonEnvoie.setBackgroundColor(Color.GRAY);
                    ((MainActivity) act).buttonEnvoie.setTextColor(Color.BLACK);
                }
                else {
                    ((MainActivity) act).buttonEnvoie.setEnabled(false);
                    ((MainActivity) act).buttonEnvoie.setBackgroundColor(Color.WHITE);
                    ((MainActivity) act).buttonEnvoie.setTextColor(Color.GRAY);
                }

            }

            // e.g. To check the Network Name or other info:
            WifiManager wifiManager = (WifiManager)context.getSystemService(Context.WIFI_SERVICE);
            WifiInfo wifiInfo = wifiManager.getConnectionInfo();
            String ssid = wifiInfo.getSSID();
        }
        else {

            if (act instanceof MainActivity){
                if(f.exists() && !f.isDirectory()){
                    ((MainActivity) act).buttonConsulter.setEnabled(true);
                    ((MainActivity) act).buttonConsulter.setBackgroundColor(Color.GRAY);
                    ((MainActivity) act).buttonConsulter.setTextColor(Color.BLACK);
                }
                else {
                    ((MainActivity) act).buttonConsulter.setEnabled(false);
                    ((MainActivity) act).buttonConsulter.setBackgroundColor(Color.WHITE);
                    ((MainActivity) act).buttonConsulter.setTextColor(Color.GRAY);

                }
                ((MainActivity) act).buttonEnvoie.setEnabled(false);
                ((MainActivity) act).buttonEnvoie.setBackgroundColor(Color.WHITE);
                ((MainActivity) act).buttonEnvoie.setTextColor(Color.GRAY);
            }

            /*if(act instanceof Envoi_Donnees){
                final Envoi_Donnees envoi=(Envoi_Donnees)act;
                act.startActivity(new Intent(envoi.this,PopCrash.class));
            }*/
        }
    }
}
