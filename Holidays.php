<?php
namespace Holiddays;
/**
 * Class Holidays
 * @package App\Tools\TransFormer
 * 每年节假日都需要更新
*/
class Holidays{
    //2017节假日
    public static $holidDay=[
        '20170101',
        '20170102',
        '20170127',
        '20170128',
        '20170129',
        '20170130',
        '20170131',
        '20170201',
        '20170202',
        '20170403',
        '20170404',
        '20170429',
        '20170430',
        '20170501',
        '20170528',
        '20170529',
        '20170530',
        '20171001',
        '20171002',
        '20171003',
        '20171004',
        '20171005',
        '20171006',
        '20171007',
        '20171008',
    ];
    //2017周末工作日
    public static $workDay =[
        '20170204',
        '20170401',
        '20170527',
        '20170930',
    ];

    /**
     * 处理工作日 如果是节假日后周末则返回下一个工作日的日期
     * @param string $date
     * @return string
     */
    public static function findWorkDay($date=''){
        if(empty($date)){
            $date=date('Ymd');
        }else{
            $date=date('Ymd',strtotime($date));
        }
        //周末工作日
        $workres = in_array($date,self::$workDay);
        if($workres){
            return $date=date('Y-m-d',strtotime($date));
        }
        resday:
        //判断是否是节假日和周末
        $holidres = in_array($date,self::$holidDay);
        if($holidres||date('w',strtotime($date))==6||date('w',strtotime($date))==0){
           $date = date('Ymd',strtotime('+1 day',strtotime($date)));
            goto resday;
        }
        return date('Y-m-d',strtotime($date));
    }
}