package Lib.src.main.java.com.example.lib.common;

import com.example.lib.model.Customer;

public class Url {
    private static String ipv4Address = "192.168.1.77";
    public static final String AppFood_Url = "http://"+ ipv4Address +"/AppFood/";
    public static final String postUserInfo= "http://"+ ipv4Address +"/AppFood/thongtinkhachhang.php";
    public static final String postBillDetail = "http://"+ ipv4Address +"/AppFood/chitietdonhang.php";

    public static Customer customer_current = new Customer();
}
//http://192.168.1.6/AppFood/