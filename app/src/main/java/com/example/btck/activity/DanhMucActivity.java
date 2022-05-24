package com.example.btck.activity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;


import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.appfood.R;
import com.example.btck.adapter.DanhMucAdapter;

import java.util.ArrayList;
import java.util.List;

import Lib.src.main.java.com.example.lib.InterfaceResponsitory.AppFoodMethods;
import Lib.src.main.java.com.example.lib.RetrofitClient;
import Lib.src.main.java.com.example.lib.common.NetworkConnection;
import Lib.src.main.java.com.example.lib.common.Show;
import Lib.src.main.java.com.example.lib.common.Url;
import Lib.src.main.java.com.example.lib.model.DanhMuc;
import io.reactivex.rxjava3.android.schedulers.AndroidSchedulers;
import io.reactivex.rxjava3.disposables.CompositeDisposable;
import io.reactivex.rxjava3.schedulers.Schedulers;


public class DanhMucActivity extends AppCompatActivity {
    Toolbar toolbar_Danhmuc;
    RecyclerView recycleView_DanhMuc;

    CompositeDisposable compositeDisposable = new CompositeDisposable();
    AppFoodMethods appFoodMethods;

    List<DanhMuc.Result> listDanhMucResult;
    DanhMucAdapter danhMucAdapter;

    TextView thongbao_soluong;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_danh_muc);

        getViewId();
        actionToolbar();
        khoitao();

        if(NetworkConnection.isConnected(this)) {
//            ShowToast.Notify(this,"Internet thành công!");
            GetDanhMuc();
            Show.thayDoiSoLuongGioHangNho(thongbao_soluong);
        }else{
            Show.Notify(this,getString(R.string.error_network));
            finish();
        }
    }

    private void actionToolbar() {
        setSupportActionBar(toolbar_Danhmuc);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        toolbar_Danhmuc.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
//                Intent trangchu = new Intent(getApplicationContext(),MainActivity.class);
//                startActivity(trangchu);
                finish();
            }
        });
    }

    private void khoitao() {
        listDanhMucResult = new ArrayList<>();
        appFoodMethods = RetrofitClient.getRetrofit(Url.AppFood_Url).create(AppFoodMethods.class);

        //set layout 2 cột
        RecyclerView.LayoutManager layoutManager = new GridLayoutManager(this,2);
        recycleView_DanhMuc.setLayoutManager(layoutManager);
        recycleView_DanhMuc.setHasFixedSize(true);
    }

    private void GetDanhMuc() {
        compositeDisposable.add(appFoodMethods.GET_DanhMuc()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(
                danhMuc -> {
                    if(danhMuc.isSuccess()) {
                        listDanhMucResult = danhMuc.getResult();
                        danhMucAdapter = new DanhMucAdapter(this,listDanhMucResult);
                        recycleView_DanhMuc.setAdapter(danhMucAdapter);
                    }
                },
                throwable -> {
                    Show.Notify(this,getString(R.string.error_server));
                }
        ));
    }

    public void ToHome(View view) {
        Intent trangchu = new Intent(getApplicationContext(),MainActivity.class);
        startActivity(trangchu);
    }

    public void openCart(View view) {
        Intent giohang = new Intent(getApplicationContext(),GioHangActivity.class);
        startActivity(giohang);
    }

    private void getViewId() {
        toolbar_Danhmuc = findViewById(R.id.toolbar_Danhmuc);
        recycleView_DanhMuc = findViewById(R.id.recycleView_DanhMuc);
        thongbao_soluong = findViewById(R.id.thongbao_soluong);
    }

    @Override
    protected void onStart() {
        super.onStart();
        Show.thayDoiSoLuongGioHangNho(thongbao_soluong);
    }

    @Override
    protected void onResume() {
        super.onResume();
        Show.thayDoiSoLuongGioHangNho(thongbao_soluong);
    }


    @Override
    protected void onDestroy() {
        compositeDisposable.clear();
        super.onDestroy();
    }
}