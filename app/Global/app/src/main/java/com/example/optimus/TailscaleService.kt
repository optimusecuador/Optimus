package com.example.optimus

import android.app.Service
import android.content.Intent
import android.os.IBinder
import android.util.Log
import wrapper.Wrapper

class TailscaleService : Service() {

    override fun onBind(intent: Intent?): IBinder? = null

    override fun onStartCommand(intent: Intent?, flags: Int, startId: Int): Int {
        val authKey = "tskey-auth-kna54EaERo11CNTRL-R67QGemGxz2rGCkreBcxz2VeHk9Sde12"

        Thread {
            try {
                val dataPath = filesDir.absolutePath
                Log.d("TailscaleService", "Iniciando nodo Tailscale...")

                // Llamamos a la nueva función NewTsNode
                val node = Wrapper.newTsNode("android-embedded-node", authKey, dataPath)

                // Llamamos a la nueva función StartNode
                node.startNode()

                Log.d("TailscaleService", "Tailscale iniciado exitosamente.")
            } catch (e: Exception) {
                Log.e("TailscaleService", "Error iniciando Tailscale", e)
            }
        }.start()

        return START_STICKY
    }
}