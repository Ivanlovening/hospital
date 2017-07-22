<?php
namespace Admin\Model;


/**
 *  经销商
 */
class DealerModel extends BaseModel{
    public function __construct()
    {
        parent::__construct();
    }
    /* 用户模型自动验证 */
    protected $_validate = array(

        /* 验证邮箱
         *
         *   array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
         *             1. 要进行验证规则，需要结合附加规则
         *             2. 验证条件 {
         *                      0 存在字段就验证
         *                      1 必须验证
         *                      2 值不为空验证
         *                 }
         *              3. 验证条件 {
         *                      验证规则        附加规则
         *                      regex           /[0-9]/
         *                      function        函数名
         *                      callback        当前model的一个方法
         *                      confirm         验证表单中的两个字段是否相同，定义的验证规则是一个字段名
         *                      equal            验证是否等于某个值，该值由前面的验证规则定义
         *                      in                 验证是否在某个范围内，定义的验证规则必须是一个数组
         *                      length           验证长度，定义的验证规则可以是一个数字（表示固定长度）或者数字范围（例如3,12 表示长度从3到12的范围）
         *                      unique          验证是否唯一，系统会根据字段目前的值查询数据库来判断是否存在相同的值。
         *                      expire           验证是否在有效期，定义的验证规则表示时间范围，可以到时间，例如可以使用 2012-1-15,2013-1-15 表示当前提交有效期在2012-1-15到2013-1-15之间，也可以使用时间戳定义
         *                      ip_allow[ip_demy] 验证IP是否允许，定义的验证规则表示允许的IP地址列表，用逗号分隔，例如 201.12.2.5,201.12.2.6
         *                  }
         *                 4. 验证时间 {
         *                      1 新增数据时候验证
         *                      2 编辑数据时候验证
         *                      3 全部情况下验证（默认）
         *                  }
         *      use   {
         *
         *              $User = D("User"); // 实例化User对象
         *               if (!$User->create()){
         *                  // 如果创建失败 表示验证没有通过 输出错误提示信息
         *               exit($User->getError());
         *               }else{
         *                   // 验证通过 可以进行其他数据操作
         *               }
         *
         *      }
         *
         *
         *
         *   array('verify','require','验证码必须！'), //默认情况下用正则进行验证
         *   array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
         *   array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
         *   array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
         *   array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
         *   array('email', 'email', -5, 0), //邮箱格式不正确
         *   array('email', '1,32', -6, 0, 'length'), //邮箱长度不合法
         *   array('email', '', -8, 0, 'unique', 1), //邮箱被占用
         *
         */
        array('account', 'require', 1),
        array('phone', 'require', 3),
        array('address', 'require', 2),
        array('idcard', 'require', 4),
        array('overtime', 'require', 5),


    );

    /* 用户模型自动完成
     *      array(填充字段,填充规则,[填充时间,附加规则])
     *
     *          1. 要进行填充规则，需要结合附加规则
     *          2. 填充时间 {
     *                       1 新增数据的时候处理（默认）
     *                       2 更新数据的时候处理
     *                       3 所有情况都进行处理
     *              }
     *          3. 附加规则{
     *                   function ：使用函数，表示填充的内容是一个函数名
     *                   callback ：回调方法 ，表示填充的内容是一个当前模型的方法
     *                   field ：用其它字段填充，表示填充的内容是一个其他字段的值
     *                   ignore ：为空则忽略，3.1.2版本开始支持，如果该字段的值恒等于空字符串则忽略该字段的值
     *                   string ：字符串（默认方式）
     *               }
     *
     *      use   {
     *
     *              $User = D("User"); // 实例化User对象
     *               if (!$User->create()){
     *                  // 如果创建失败 表示验证没有通过 输出错误提示信息
     *               exit($User->getError());
     *               }else{
     *                   // 验证通过 可以进行其他数据操作
     *               }
     *
     *      }
     *
     *
     */
    protected $_auto = array(
       /* //	array('password', 'think_ucenter_md5', self::MODEL_BOTH, 'function', C('UC_AUTH_KEY')),
        array('reg_time', NOW_TIME, self::MODEL_INSERT),
        array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function', 1),
        array('update_time', NOW_TIME),
        array('status', 'getStatus', self::MODEL_BOTH, 'callback'),*/
        array('status','1'),
        array('pid','0'),
        array('level','0')
    );

    /*
        根据错误编号返回错误提示
    */
    public function getErrorStr()
    {
        $index = $this->getError();
        switch ($index)
        {
            case 1:
                return '用户名必须填';
            case 2:
                return '地址必须填';
            case 3:
                return '手机号码必须填';
            case 4:
                return '身份证必须填';
            case 5:
                return '经销商期限';
            default:
                return '未知错误';
        }
    }
}