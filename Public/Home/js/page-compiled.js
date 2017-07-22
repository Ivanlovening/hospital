'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

//ajax分页类

var page = {
    //初始化

    /*
    * 初始化参数 data param object
    *
    *    data
    *    {
    *           "targetUrl" : 目标url,
    *           "target" : 点击目标,
    *           "pageTarget" : 分页目标,
    *           "dataTarget" : 内容目标,
    *           "jumpInfo" :
    *           {
    *               "name" : xxxx,
    *               "url" : xxxx
    *           }
    *    }
    *
    *
    * */

    init: function init(data) {
        //初始化
        if (data && (typeof data === 'undefined' ? 'undefined' : _typeof(data)) == 'object') {
            Object.assign(this, data);
            this.checkParam();
            this.getData();
            return this;
        } else {
            return false;
        }
    },
    checkParam: function checkParam() {
        //修改参数
        this.page = this.target.attr('data-page');
        this.url = this.targetUrl.replace(/[0-9]/g, this.page);
    },
    getData: function getData() {
        //获取数据
        /*$.get(this.url, "", function(data) {
             this.result = data;
         })*/
        var _that = this;

        $.get(this.url, "", function (data) {
            //Object.assign(this, _obj)
            //console.log(data);
            Object.assign(_that, data);
        });
    },
    putPage: function putPage() {
        //添加分页
        //console.log(this.page);
        var _pageBox = this.pageTarget;
        _pageBox.empty();
        //if(this.result)
        _pageBox.append(this.result.page);
    },
    gennerateHtml: function gennerateHtml() {

        //构造html
        var _html;
        var _len = this.result['data'].length();
        $.each(this.result['data'], function (key, value) {
            _html += "<tr>";
            for (var i = 0; i <= _len; i++) {
                _html += "<td>" + value + "</td>";
            }
            _html += "<td>";
            for (var _i = 0; _i <= this.jumpInfo.length(); _i++) {
                _html += "<a href=" + rep(this.jumpInfo[_i]['url'], this.result['data'][key]['id']) + ">" + this.jumpUrl[_i]['name'] + "</a>";
            }
            _html += "</td></tr>";
        });
        return _html;
    },
    rep: function rep(url, id) {
        //构造带参数的url
        return url.replace(/.html$/, '') + "/id/" + id;
    },
    putData: function putData() {
        //添加数据
        var _comtentBox = this.dataTarget;
        _comtentBox.empty();
        _comtentBox.append(this.putPage());
    }
};

//# sourceMappingURL=page-compiled.js.map