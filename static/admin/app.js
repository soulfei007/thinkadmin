//Require.js配置参数
var baseUrl = (function () {
    var scripts = document.scripts,src = scripts[scripts.length - 1].src;
   return src.substring(0, src.lastIndexOf("/") + 1);
 
})();

require.config({
  baseUrl:baseUrl,
  waitSeconds:0,
  map:{'*':{css:'../plugs/require/require.css.js'}},
  paths:{
   'jquery':['../plugs/jquery/jquery.min'],
   'layui':['../plugs/layui/layui'],
   'laydate':['../plugs/layui/laydate/laydate'],
   'xadmin':['../plugs/xadmin/js/xadmin'],
  },

  shim:{
   'layui':{deps:['jquery']},
   'laydate':{deps:['jquery']},
   'xadmin':{deps:['jquery']},
  },
});

require(['jquery','layui'],function(){
   layui.config({dir:baseUrl+'../plugs/layui/'});
   layui.use(['layer','form'],function(){
       window.layer = layui.layer;
       window.form = layui.form();
   });

});