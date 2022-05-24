package com.example.btck.activity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.AppCompatButton;

import com.example.appfood.R;


import Lib.src.main.java.com.example.lib.InterfaceResponsitory.AppFoodMethods;
import Lib.src.main.java.com.example.lib.RetrofitClient;
import Lib.src.main.java.com.example.lib.common.Url;
//import io.paperdb.Paper;
import io.reactivex.rxjava3.android.schedulers.AndroidSchedulers;
import io.reactivex.rxjava3.disposables.CompositeDisposable;
import io.reactivex.rxjava3.schedulers.Schedulers;

public class Login_Activity extends AppCompatActivity {
    TextView changeregister;//comeback register
    EditText gmail_cus,pass_cus;
    AppCompatButton btn_login;
    AppFoodMethods apiAppfood;
    CompositeDisposable compositeDisposable = new CompositeDisposable();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);
        initView();
        initControl();
    }
    private void initControl() {
        changeregister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent =new Intent(getApplicationContext(), Register_Activity.class);
                startActivity(intent);
            }
        });
        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String str_gmail = gmail_cus.getText().toString().trim();
                String str_pass = pass_cus.getText().toString().trim();
                if(TextUtils.isEmpty(str_gmail)){
                    Toast.makeText(getApplicationContext(),"Bạn chưa nhập Gmail", Toast.LENGTH_SHORT).show();
                }else if(TextUtils.isEmpty(str_pass)){
                    Toast.makeText(getApplicationContext(),"Vui lòng nhập Pass",Toast.LENGTH_SHORT).show();
                }else{
                    compositeDisposable.add(apiAppfood.login(str_gmail,str_pass)
                            .subscribeOn(Schedulers.io())
                            .observeOn(AndroidSchedulers.mainThread())
                            .subscribe(
                                    customerModel -> {
                                        if (customerModel.isSuccess()) {
                                            Url.customer_current = customerModel.getResult().get(0);
                                            Intent intent = new Intent(getApplicationContext(),MainActivity.class);
                                            startActivity(intent);
                                            finish();
                                        }
                                    },throwable -> {
                                        Log.d("test", throwable.getMessage());
                                    }
                            )
                    );
            }
            }
        });

    }

    private void initView() {
        Paper.init(this);

        apiAppfood = RetrofitClient.getRetrofit(Url.AppFood_Url).create(AppFoodMethods.class);
        changeregister=findViewById(R.id.changeregister);
        gmail_cus = findViewById(R.id.gmail_cus);
        pass_cus = findViewById(R.id.password_cus);
        btn_login = findViewById(R.id.button_log);
//        txtresetpass = findViewById(R.id.txtresetpass);

       // read data
        if(Paper.book().read("gmail_cus") != null && Paper.book().read("pass_cus") != null){
            gmail_cus.setText(Paper.book().read("gmail_cus"));
            pass_cus.setText(Paper.book().read("pass_cus"));
        }
    }

    @Override
    protected void onResume() {
        super.onResume();
        if (Url.customer_current.getGmail_cus() != null && Url.customer_current.getPass_cus() != null){
            gmail_cus.setText(Url.customer_current.getGmail_cus());
            pass_cus.setText(Url.customer_current.getPass_cus());
        }
    }
    //
    @Override
    protected void onDestroy() {
        compositeDisposable.clear();

        super.onDestroy();

    }
}
