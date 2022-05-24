package com.example.btck.activity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
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
import io.reactivex.rxjava3.android.schedulers.AndroidSchedulers;
import io.reactivex.rxjava3.disposables.CompositeDisposable;
import io.reactivex.rxjava3.schedulers.Schedulers;


public class Register_Activity extends AppCompatActivity {
    EditText name_cus, age_cus, re_pass,phone_cus,addr_cus,gmail_cus,pass_cus;
    TextView txtLogin;
    AppCompatButton button;
    AppFoodMethods apiAppfood;
    CompositeDisposable compositeDisposable = new CompositeDisposable();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register);
        initView();
        initControl();
    }

    private void initControl() {
        txtLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getApplicationContext(),Login_Activity.class);
                startActivity(intent);
            }
        });
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                register();
            }
        });

    }

    private void register() {
        String str_name = name_cus.getText().toString().trim();
        String str_age = age_cus.getText().toString().trim();
        String str_phone = phone_cus.getText().toString().trim();
        String str_addr = addr_cus.getText().toString().trim();
        String str_gmail = gmail_cus.getText().toString().trim();
        String str_password = pass_cus.getText().toString().trim();
        String str_repass = re_pass.getText().toString().trim();
        if(TextUtils.isEmpty(str_name)){
            Toast.makeText(getApplicationContext(),"Bạn chưa nhập Name", Toast.LENGTH_SHORT).show();
        }else  if(TextUtils.isEmpty(str_age)){
            Toast.makeText(getApplicationContext(),"Vui lòng nhập Tuổi",Toast.LENGTH_SHORT).show();
        }else  if(TextUtils.isEmpty(str_phone)) {
            Toast.makeText(getApplicationContext(), "Vui lòng nhập SĐT", Toast.LENGTH_SHORT).show();
        }else if(TextUtils.isEmpty(str_gmail)){
            Toast.makeText(getApplicationContext(),"Bạn chưa nhập Gmail", Toast.LENGTH_SHORT).show();
        }else if(TextUtils.isEmpty(str_addr)){
            Toast.makeText(getApplicationContext(),"Bạn chưa nhập địa chỉ", Toast.LENGTH_SHORT).show();
        }else if(TextUtils.isEmpty(str_password)){
            Toast.makeText(getApplicationContext(),"Bạn chưa nhập Password", Toast.LENGTH_SHORT).show();
        }else if(TextUtils.isEmpty(str_repass)){
            Toast.makeText(getApplicationContext(),"Bạn chưa nhập Confirm new password", Toast.LENGTH_SHORT).show();
        }else {
            if(str_password.equals((str_repass))){
                //post data
                compositeDisposable.add(apiAppfood.register(str_name,str_age,str_phone,str_addr,str_gmail,str_password,str_repass)
                        .subscribeOn(Schedulers.io())
                        .observeOn(AndroidSchedulers.mainThread())
                        .subscribe(
                                customerModel -> {
                                    if(customerModel.isSuccess()){
                                        Url.customer_current.setGmail_cus(str_gmail);
                                        Url.customer_current.setPass_cus(str_password);
//                                        Url.customer_current.setName_cus(str_name);
//                                        Url.customer_current.setPhone_cus(str_phone);
                                        Intent intent = new Intent(getApplicationContext(),Login_Activity.class);
                                        startActivity(intent);
                                        finish();
                                    }else{
                                        Toast.makeText(getApplicationContext(),customerModel.getMessage(), Toast.LENGTH_SHORT).show();
                                    }
                                },throwable -> {
                                    Toast.makeText(getApplicationContext(),throwable.getMessage(), Toast.LENGTH_SHORT).show();
                                }
                        )
                );
            }else {
                Toast.makeText(getApplicationContext(), "Password chưa giống nhau", Toast.LENGTH_SHORT).show();
            }
        }

    }

    private void initView() {
        apiAppfood = RetrofitClient.getRetrofit(Url.AppFood_Url).create(AppFoodMethods.class);
        button = findViewById(R.id.btn_register);

        name_cus =findViewById(R.id.name_cus);
        age_cus  =findViewById(R.id.age_cus);
        addr_cus =findViewById(R.id.adrr_cus);
        re_pass  =findViewById(R.id.re_password);
        phone_cus =findViewById(R.id.phone_cus);
        gmail_cus =findViewById(R.id.gmail_cus_regis) ;
        pass_cus  =findViewById(R.id.password);
        txtLogin = findViewById(R.id.txtlogin);

    }

    @Override
    protected void onDestroy() {
        compositeDisposable.clear();
        super.onDestroy();
    }
}
