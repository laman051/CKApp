package com.example.btck.CustomView_Login;

import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.content.Context;
import android.content.res.TypedArray;
import android.graphics.drawable.Drawable;
import android.os.Build;
import android.text.InputType;
import android.util.AttributeSet;
import android.view.MotionEvent;
import android.widget.EditText;

import androidx.core.content.ContextCompat;

import com.example.appfood.R;

@SuppressLint("AppCompatCustomView")
public class Hidden_pass extends EditText {
    Drawable eye,no_eye;
    //lưu trạng thái
    Boolean attr_eye =false;
    Boolean use_try_eye = false;
    Drawable drawable;
    int ALPHA =(int) (255 * .45f);//độ mờ của logo eye

    public Hidden_pass(Context context) {
        super(context);
        khoi_tao(null);
    }

    public Hidden_pass(Context context, AttributeSet attrs) {
        super(context, attrs);
        khoi_tao(attrs);
    }

    public Hidden_pass(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        khoi_tao(attrs);
    }
    @TargetApi(Build.VERSION_CODES.LOLLIPOP)
    public Hidden_pass(Context context, AttributeSet attrs, int defStyleAttr, int defStyleRes) {
        super(context, attrs, defStyleAttr, defStyleRes);
        khoi_tao(attrs);
    }
    private void  khoi_tao(AttributeSet attrs){
        if (attrs != null){
            TypedArray array_eye = getContext().getTheme().obtainStyledAttributes(attrs, R.styleable.Hidden_pass,0,0);
            this.use_try_eye = array_eye.getBoolean(R.styleable.Hidden_pass_use_try_eye,false);
        }
        eye= ContextCompat.getDrawable(getContext(), R.drawable.eye).mutate();
        no_eye= ContextCompat.getDrawable(getContext(),R.drawable.eye_off).mutate();;
        caidat();
    }

    private void caidat(){
        setInputType(InputType.TYPE_CLASS_TEXT |(attr_eye? InputType.TYPE_TEXT_VARIATION_VISIBLE_PASSWORD : InputType.TYPE_TEXT_VARIATION_PASSWORD));
        Drawable[] drawables =getCompoundDrawables();
        drawable = use_try_eye  && !attr_eye? no_eye : eye;
        drawable.setAlpha(ALPHA);
        setCompoundDrawablesWithIntrinsicBounds(drawables[0],drawables[1],drawable,drawables[3]);
    }





    @Override
    public boolean onTouchEvent(MotionEvent event) {//phần đổi con mắt chưa được
        if (event.getAction() == MotionEvent.ACTION_UP && event.getX() >= (getLeft() + drawable.getBounds().width() )){ //phải là >=
            attr_eye= !attr_eye;
            caidat();
            invalidate();
        }
        return super.onTouchEvent(event);
    }
}
