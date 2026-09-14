package com.example.optimus

import android.content.Intent
import android.net.VpnService
import android.os.ParcelFileDescriptor
import android.util.Log
import bridge.Bridge

class NetBirdVpnService : VpnService() {

    private var vpnInterface: ParcelFileDescriptor? = null
    private var isRunning = false

    override fun onStartCommand(intent: Intent?, flags: Int, startId: Int): Int {
        val setupKey = intent?.getStringExtra("SETUP_KEY") ?: ""

        Thread {
            try {
                startVpnTunnel(setupKey)
            } catch (e: Exception) {
                Log.e("NetBirdVpnService", "Error crítico en el hilo de VPN", e)
            }
        }.start()

        return START_STICKY
    }

    private fun startVpnTunnel(setupKey: String) {
        if (isRunning) return
        isRunning = true

        try {
            val builder = Builder()
                .addAddress("100.64.0.10", 32)
                .addRoute("0.0.0.0", 0)
                .setSession("NetBirdVpn")

            vpnInterface = builder.establish()

            if (vpnInterface == null) {
                Log.e("NetBirdVpnService", "No se pudo establecer la interfaz VPN")
                isRunning = false
                return
            }

            val fd = vpnInterface!!.fd
            Log.d("NetBirdVpnService", "Túnel VPN establecido correctamente con FD: $fd")
            Log.d("NetBirdVpnService", "Iniciando motor Go con SetupKey de longitud: ${setupKey.length}")

            // Llamada al motor de Go (gomobile traduce 'RunNetbird' a 'runNetbird' en Kotlin)
            Bridge.runNetbird(fd.toLong(), setupKey)

            // Mantiene el hilo bloqueado para evitar que el servicio se destruya y cierre la VPN
            while (isRunning) {
                Thread.sleep(1000)
            }

        } catch (e: Exception) {
            Log.e("NetBirdVpnService", "Excepción atrapada en startVpnTunnel", e)
        } finally {
            stopVpn()
        }
    }

    private fun stopVpn() {
        isRunning = false
        try {
            vpnInterface?.close()
            vpnInterface = null
        } catch (e: Exception) {
            e.printStackTrace()
        }
    }

    override fun onDestroy() {
        super.onDestroy()
        stopVpn()
    }
}