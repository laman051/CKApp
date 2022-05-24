package Lib.src.main.java.com.example.lib.model;

import java.util.List;

public class CustomerModel {
    boolean success;
    String message;
    List<Customer> rs_login;

    public boolean isSuccess() {
        return success;
    }

    public void setSuccess(boolean success) {
        this.success = success;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public List<Customer> getResult() {
        return rs_login;
    }

    public void setResult(List<Customer> result) {
        this.rs_login = result;
    }
}
