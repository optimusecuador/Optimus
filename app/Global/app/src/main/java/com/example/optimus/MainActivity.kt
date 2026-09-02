package com.example.global // Mantén tu package original

import android.content.pm.ActivityInfo
import android.content.res.Configuration
import android.os.Bundle
import android.view.View
import android.webkit.WebChromeClient
import android.webkit.WebView
import android.webkit.WebViewClient
import android.widget.FrameLayout
import androidx.activity.OnBackPressedCallback
import androidx.appcompat.app.AppCompatActivity
import com.example.global.R

class MainActivity : AppCompatActivity() {

    private lateinit var myWebView: WebView

    private var customView: View? = null
    private var customViewCallback: WebChromeClient.CustomViewCallback? = null
    private var customChromeClient: WebChromeClient? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        myWebView = findViewById(R.id.miWebView)

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

                // 🔥 NUEVO: Forzar la pantalla a posición horizontal (Landscape)
                requestedOrientation = ActivityInfo.SCREEN_ORIENTATION_SENSOR_LANDSCAPE
            }

            override fun onHideCustomView() {
                (window.decorView as FrameLayout).removeView(customView)
                customView = null

                @Suppress("DEPRECATION")
                window.decorView.systemUiVisibility = View.SYSTEM_UI_FLAG_VISIBLE

                customViewCallback?.onCustomViewHidden()
                customViewCallback = null

                // 🔥 NUEVO: Regresar la pantalla a posición normal (Vertical)
                requestedOrientation = ActivityInfo.SCREEN_ORIENTATION_UNSPECIFIED
                // Si quieres que tu app sea 100% vertical siempre excepto en video,
                // usa esto en su lugar: requestedOrientation = ActivityInfo.SCREEN_ORIENTATION_PORTRAIT
            }
        }

        myWebView.webChromeClient = customChromeClient

        onBackPressedDispatcher.addCallback(this, object : OnBackPressedCallback(true) {
            override fun handleOnBackPressed() {
                if (customView != null) {
                    customChromeClient?.onHideCustomView()
                } else if (myWebView.canGoBack()) {
                    myWebView.goBack()
                } else {
                    finish()
                }
            }
        })

        // CAMBIA ESTA URL POR LA TUYA
        myWebView.loadUrl("http://100.117.94.55/optimus/peliculas/index.php")
    }

    override fun onConfigurationChanged(newConfig: Configuration) {
        super.onConfigurationChanged(newConfig)
    }
}