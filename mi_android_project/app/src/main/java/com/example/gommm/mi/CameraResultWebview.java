package com.example.gommm.mi;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.KeyEvent;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class CameraResultWebview extends AppCompatActivity {

    private WebView mWebView;
    public Context mContext;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_camera_result_webview);
        mContext = this.getApplicationContext();

        Intent intent = getIntent();
        final String uploadFileName = intent.getStringExtra("fileName");

        mWebView = (WebView)findViewById(R.id.webview);

        //웹뷰에서 자바스크립트 실탱
        mWebView.getSettings().setJavaScriptEnabled(true);
        //홈페이지 지정
        mWebView.loadUrl("http://ctrlcv.io/mi/start.php?filename=" + uploadFileName);
        //mWebView.loadUrl("http://ctrlcv.io/mi/");
        //웹뷰 클라이언트 지정
        mWebView.setWebViewClient(new CameraResultWebview.WebViewClientClass());
        //세로 스크롤 활성화
        mWebView.setHorizontalScrollBarEnabled(true);
        //가로 스크롤 비 활성화
        mWebView.setVerticalScrollBarEnabled(false);
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if ((keyCode == KeyEvent.KEYCODE_BACK) && mWebView.canGoBack()) {
            mWebView.goBack();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }

    public class WebViewClientClass extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            if(url.startsWith("app://")){
                Intent intent = new Intent(mContext.getApplicationContext(), CameraConnect.class);
                startActivity(intent);
                return true;
            }
            else {
                view.loadUrl(url);
                return true;
            }
        }
    }
}
