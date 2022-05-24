package Lib.src.main.java.com.example.lib.InterfaceResponsitory;

import com.example.lib.model.CustomerModel;
import com.example.lib.model.DanhMuc;
import com.example.lib.model.Mon;

import io.reactivex.rxjava3.core.Observable;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface AppFoodMethods {
    @GET("danhmuc.php")
    Observable<DanhMuc> GET_DanhMuc();

    @GET("monngaunhien.php")
    Observable<Mon> GET_MonNgauNhien();

    @POST("chitietdanhmuc.php")
    @FormUrlEncoded
    Observable<Mon> POST_MonTheoDanhMuc(
//            @Field("page") int page,
//            @Field("select") int select,
            @Field("madanhmuc") int madanhmuc
    );

    @POST("get_register.php")
    @FormUrlEncoded
    Observable<CustomerModel> register(
            @Field("name_cus") String name_cus,
            @Field("age_cus") String age_cus,
            @Field("phone_cus") String phone_cus,
            @Field("addr_cus") String addr_cus,
            @Field("gmail_cus") String gmail_cus,
            @Field("pass_cus") String pass_cus,
            @Field("re_pass") String re_pass
    );


    @POST("login.php")
    @FormUrlEncoded
    Observable<CustomerModel> login(
            @Field("gmail_cus") String gmail_cus,
            @Field("pass_cus") String pass_cus
    );

//    @POST("show_in4_cus.php")
//    @FormUrlEncoded
//    Observable<CustomerModel> show_in4cus(
//            @Field("gmail_cus") String gmail_cus,
//            @Field("pass_cus") String pass_cus,
//            @Field("phone_cus") String phone_cus
//    );

}
