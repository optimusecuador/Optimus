package com.example.global

import android.content.pm.ActivityInfo
import android.content.res.Configuration
import android.os.Bundle
import android.view.View
import android.webkit.WebChromeClient
import android.webkit.WebView
import android.webkit.WebViewClient
import android.widget.Button
import android.widget.FrameLayout
import android.widget.LinearLayout
import androidx.activity.OnBackPressedCallback
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import com.example.global.R

class MainActivity : AppCompatActivity() {

    private lateinit var myWebView: WebView
    private lateinit var layoutErrorNetbird: LinearLayout
    private lateinit var btnRedLocal: Button

    private var customView: View? = null
    private var customViewCallback: WebChromeClient.CustomViewCallback? = null
    private var customChromeClient: WebChromeClient? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // Enlazar vistas
        myWebView = findViewById(R.id.miWebView)
        layoutErrorNetbird = findViewById(R.id.layoutErrorNetbird)
        btnRedLocal = findViewById(R.id.btnRedLocal)

        // Configuración de WebView
        myWebView.settings.javaScriptEnabled = true
        myWebView.settings.domStorageEnabled = true
        myWebView.settings.mediaPlaybackRequiresUserGesture = false
        myWebView.webViewClient = WebViewClient()

        customChromeClient = object : WebChromeClient() {
            override fun onShowCustomView(view: View?, callback: CustomViewCallback?) {
                if (customView != null) {
                    onHideCustomView()
                    return
                }
                customView = view
                customViewCallback = callback

                (window.decorView as FrameLayout).addView(
                    customView,
                    FrameLayout.LayoutParams(
                        FrameLayout.LayoutParams.MATCH_PARENT,
                        FrameLayout.LayoutParams.MATCH_PARENT
                    )
                )

                @Suppress("DEPRECATION")
                window.decorView.systemUiVisibility = (View.SYSTEM_UI_FLAG_FULLSCREEN
                        or View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
                        or View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY)

                requestedOrientation = ActivityInfo.SCREEN_ORIENTATION_SENSOR_LANDSCAPE
            }

            override fun onHideCustomView() {
                (window.decorView as FrameLayout).removeView(customView)
                customView = null

                @Suppress("DEPRECATION")
                window.decorView.systemUiVisibility = View.SYSTEM_UI_FLAG_VISIBLE

                customViewCallback?.onCustomViewHidden()
                customViewCallback = null

                requestedOrientation = ActivityInfo.SCREEN_ORIENTATION_UNSPECIFIED
            }
        }

        myWebView.webChromeClient = customChromeClient

        onBackPressedDispatcher.addCallback(this, object : OnBackPressedCallback(true) {
            override fun handleOnBackPressed() {
                if (customView != null) {
                    customChromeClient?.onHideCustomView()
                } else if (myWebView.visibility == View.VISIBLE && myWebView.canGoBack()) {
                    myWebView.goBack()
                } else {
                    finish()
                }
            }
        })

        // Configurar acción del botón "Continuar con Red Local"
        btnRedLocal.setOnClickListener {
            layoutErrorNetbird.visibility = View.GONE
            myWebView.visibility = View.VISIBLE
            myWebView.loadUrl("http://10.9.0.250/optimus/jellyfin/index.php")
        }

        // Ejecutar Ping al iniciar
        checkServerAndLoad()
    }

    private fun checkServerAndLoad() {
        // Lanzar tarea en hilo secundario (IO)
        lifecycleScope.launch(Dispatchers.IO) {
            val ipPrincipal = "100.117.94.55"
            val isReachable = try {
                // Ejecuta un ping nativo en el sistema (1 paquete, maximo 2 segundos de espera)
                val process = Runtime.getRuntime().exec("/system/bin/ping -c 1 -W 2 $ipPrincipal")
                val status = process.waitFor()
                status == 0 // Si el status es 0, el ping fue exitoso
            } catch (e: Exception) {
                e.printStackTrace()
                false
            }

            // Volver al hilo principal para actualizar la UI
            withContext(Dispatchers.Main) {
                if (isReachable) {
                    // Ping exitoso: mostrar WebView y cargar IP remota
                    layoutErrorNetbird.visibility = View.GONE
                    myWebView.visibility = View.VISIBLE
                    myWebView.loadUrl("http://100.117.94.55/optimus/peliculas/index.php")
                } else {
                    // Ping fallido: mostrar pantalla de Netbird
                    myWebView.visibility = View.GONE
                    layoutErrorNetbird.visibility = View.VISIBLE
                }
            }
        }
    }

    override fun onConfigurationChanged(newConfig: Configuration) {
        super.onConfigurationChanged(newConfig)
    }
}