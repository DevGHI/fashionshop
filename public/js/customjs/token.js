var TokenData={
    get:()=>{
        let token=CookieUtil.get('token');
        return token;
    }
};