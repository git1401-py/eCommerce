<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute باید پذیرفته شده باشد.',
    'active_url'           => 'آدرس :attribute معتبر نیست',
    'after'                => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'       => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha'                => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash'           => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num'            => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array'                => ':attribute باید آرایه باشد.',
    'before'               => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal'      => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between'              => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean'              => 'فیلد :attribute فقط می‌تواند صفر و یا یک باشد',
    'confirmed'            => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date'                 => ':attribute یک تاریخ معتبر نیست.',
    'date_format'          => ':attribute با الگوی :format مطاقبت ندارد.',
    'different'            => ':attribute و :other باید متفاوت باشند.',
    'digits'               => ':attribute باید :digits رقم باشد.',
    'digits_between'       => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions'           => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct'             => 'فیلد :attribute تکراری است.',
    'email'                => ':attribute باید یک ایمیل معتبر باشد',
    'exists'               => ':attribute انتخاب شده، معتبر نیست.',
    'file'                 => ':attribute باید یک فایل باشد',
    'filled'               => 'فیلد :attribute الزامی است',
    'image'                => ':attribute باید تصویر باشد.',
    'in'                   => ':attribute انتخاب شده، معتبر نیست.',
    'in_array'             => 'فیلد :attribute در :other وجود ندارد.',
    'integer'              => ':attribute باید عدد صحیح باشد.',
    'ip'                   => ':attribute باید IP معتبر باشد.',
    'ipv4'                 => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6'                 => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json'                 => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'max'                  => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes'                => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes'            => ':attribute باید یکی از فرمت های :values باشد.',
    'min'                  => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file'    => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string'  => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array'   => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده، معتبر نیست.',
    'numeric'              => ':attribute باید عدد باشد.',
    'present'              => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex'                => 'فرمت :attribute معتبر نیست',
    'required'             => 'فیلد :attribute الزامی است',
    'required_if'          => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless'      => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with'        => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all'    => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without'     => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same'                 => ':attribute و :other باید مانند هم باشند.',
    'size'                 => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file'    => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string'  => ':attribute باید برابر با :size کاراکتر باشد.',
        'array'   => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'string'               => 'فیلد :attribute باید متن باشد.',
    'timezone'             => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique'               => ':attribute قبلا انتخاب شده است.',
    'uploaded'             => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url'                  => 'فرمت آدرس :attribute اشتباه است.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                  => 'نام',
        'username'              => 'نام کاربری',
        'email'                 => 'ایمیل',
        'first_name'            => 'نام',
        'last_name'             => 'نام خانوادگی',
        'password'              => 'رمز عبور',
        'password_confirmation' => 'تکرار رمز عبور',
        'city'                  => 'شهر',
        'country'               => 'کشور',
        'address'               => 'آدرس پستی',
        'phone'                 => 'شماره ثابت',
        'cellphone'             => 'شماره همراه',
        'age'                   => 'سن',
        'sex'                   => 'جنسیت',
        'gender'                => 'جنسیت',
        'day'                   => 'روز',
        'month'                 => 'ماه',
        'year'                  => 'سال',
        'hour'                  => 'ساعت',
        'minute'                => 'دقیقه',
        'second'                => 'ثانیه',
        'title'                 => 'عنوان',
        'text'                  => 'متن',
        'content'               => 'محتوا',
        'description'           => 'توضیحات',
        'excerpt'               => 'گزیده مطلب',
        'date'                  => 'تاریخ',
        'time'                  => 'زمان',
        'available'             => 'موجود',
        'size'                  => 'اندازه',
        'terms'                 => 'شرایط',
        'price'                 => 'قیمت',
        'code'                  => 'کد',
        'score'                 => 'تعداد امتیاز',
        'display_name'          => 'نام نمایشی',
        'resource'              => 'نام ریسورس',
        'old_password'          => 'رمز عبور فعلی',
        'newpassword'           => 'رمز عبور جدید',
        'newpassword_confirmation' => 'تکرار رمز عبور جدید',
        'longitude'             => 'طول جغرافیایی',
        'latitude'              => 'عرض جغرافیایی',
        'slug'                  => 'نام انگلیسی',
        'attribute_ids'         => 'ویژگی',
        'attribute_is_filter_ids'  => 'ویژگی های قابل تغییر',
        'variation_id'          => 'ویژگی متغیر',

        'brand_id'              => 'برند',
        'tag_ids'               => 'تگ',
        'primary_image'         => 'عکس اصلی',
        'images'                => 'سایر عکس ها',
        'images.1'              => ' عکس اول ',
        'images.2'              => ' عکس دوم ',
        'images.3'              => ' عکس سوم ',
        'images.4'              => ' عکس چهارم ',
        'images.5'              => ' عکس پنجم ',
        'images.6'              => ' عکس ششم ',
        'images.7'              => ' عکس هفتم ',
        'images.8'              => ' عکس هشتم ',
        'images.9'              => ' عکس نهم ',
        'images.10'             => ' عکس دهم ',
        'images.11'             => 'عکس یازدهم',
        'images.12'             => 'عکس دوازدهم',
        'images.13'             => 'عکس سیزدهم',
        'images.14'             => 'عکس چهاردهم',
        'images.15'             => 'عکس پانزدهم',
        'images.16'             => 'عکس شانزدهم',
        'images.17'             => 'عکس هفدهم',
        'images.18'             => 'عکس هجدهم',
        'images.19'             => 'عکس نوزدهم',
        'images.20'             => 'عکس بیستم',
        'category_id'           => 'دسته بندی',
        'attribute_ids'         => 'ویژگی ها',
        'attribute_ids.1'       => ' ویژگی اول ',
        'attribute_ids.2'       => ' ویژگی دوم ',
        'attribute_ids.3'       => ' ویژگی سوم ',
        'attribute_ids.4'       => ' ویژگی چهارم ',
        'attribute_ids.5'       => ' ویژگی پنجم ',
        'attribute_ids.6'       => ' ویژگی ششم ',
        'attribute_ids.7'       => ' ویژگی هفتم ',
        'attribute_ids.8'       => ' ویژگی هشتم ',
        'attribute_ids.9'       => ' ویژگی نهم ',
        'attribute_ids.10'      => ' ویژگی دهم ',
        'attribute_ids.11'      => 'ویژگی یازدهم',
        'attribute_ids.12'      => 'ویژگی دوازدهم',
        'attribute_ids.13'      => 'ویژگی سیزدهم',
        'attribute_ids.14'      => 'ویژگی چهاردهم',
        'attribute_ids.15'      => 'ویژگی پانزدهم',
        'attribute_ids.16'      => 'ویژگی شانزدهم',
        'attribute_ids.17'      => 'ویژگی هفدهم',
        'attribute_ids.18'      => 'ویژگی هجدهم',
        'attribute_ids.19'      => 'ویژگی نوزدهم',
        'attribute_ids.20'      => 'ویژگی بیستم',
        'attribute_ids.'        => 'ویژگی اول',
        'variation_values'      => 'ویژگی متغیر',
        'variation_values.value.0' => ' سری اول نام متغیر ',
        'variation_values.value.1' => ' سری دوم نام متغیر ',
        'variation_values.value.2' => ' سری سوم نام متغیر ',
        'variation_values.value.3' => ' سری چهارم نام متغیر ',
        'variation_values.value.4' => ' سری پنجم نام متغیر ',
        'variation_values.value.5' => ' سری ششم نام متغیر ',
        'variation_values.value.6' => ' سری هفتم نام متغیر ',
        'variation_values.value.7' => ' سری هشتم نام متغیر ',
        'variation_values.price.0' => ' سری اول قیمت متغیر  ',
        'variation_values.price.1' => ' سری دوم قیمت متغیر  ',
        'variation_values.price.2' => ' سری سوم قیمت متغیر  ',
        'variation_values.price.3' => ' سری چهارم قیمت متغیر  ',
        'variation_values.price.4' => ' سری پنجم قیمت متغیر  ',
        'variation_values.price.5' => ' سری ششم قیمت متغیر  ',
        'variation_values.price.6' => ' سری هفتم قیمت متغیر  ',
        'variation_values.price.7' => ' سری هشتم قیمت متغیر  ',
        'variation_values.quantity.0' => ' سری اول تعداد متغیر ',
        'variation_values.quantity.1' => ' سری دوم تعداد متغیر ',
        'variation_values.quantity.2' => ' سری سوم تعداد متغیر ',
        'variation_values.quantity.3' => ' سری چهارم تعداد متغیر ',
        'variation_values.quantity.4' => ' سری پنجم تعداد متغیر ',
        'variation_values.quantity.5' => ' سری ششم تعداد متغیر ',
        'variation_values.quantity.6' => ' سری هفتم تعداد متغیر ',
        'variation_values.quantity.7' => ' سری هشتم تعداد متغیر ',
        'variation_values.sku.0' => ' سری اول شناسه متغیر  ',
        'variation_values.sku.1' => ' سری دوم شناسه متغیر  ',
        'variation_values.sku.2' => ' سری سوم شناسه متغیر  ',
        'variation_values.sku.3' => ' سری چهارم شناسه متغیر  ',
        'variation_values.sku.4' => ' سری پنجم شناسه متغیر  ',
        'variation_values.sku.5' => ' سری ششم شناسه متغیر  ',
        'variation_values.sku.6' => ' سری هفتم شناسه متغیر  ',
        'variation_values.sku.7' => ' سری هشتم شناسه متغیر  ',

        'delivery_amount'       => 'هزینه ارسال',
        'delivery_amount_per_product' => 'هزینه ارسال به ازای محصول اضافی',
        'cellphone'             => 'شماره تلفن همراه',
        'otp'                   => 'رمز یکبار مصرف',
    ],

];
