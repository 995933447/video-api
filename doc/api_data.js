define({ "api": [
  {
    "type": "get",
    "url": "/tags/app/:appId",
    "title": "获取标签",
    "group": "Gateway",
    "name": "____",
    "description": "<p>获取标签信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "appId",
            "description": "<p>应用ID,可选。传则根据uri格式附加在uri,传则根据应用ID获取所属应用标签（后台可配置应用拥有哪些标签）,不传则获取所有视频标签</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.sort",
            "description": "<p>排序</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n       \"status\": 200,\n       \"data\": [\n         {\n              \"video\": [\n                  {\n                      \"id\": 461,\n                      \"created_at\": \"2019-07-15 10:59:45\",\n                      \"updated_at\": \"2019-07-15 10:59:45\",\n                      \"name\": \"HD\",\n                      \"status\": 1,\n                      \"sort\": 0\n                  },\n                  {\n                      \"id\": 462,\n                      \"created_at\": \"2019-07-15 11:48:06\",\n                      \"updated_at\": \"2019-07-15 11:48:06\",\n                      \"name\": \"中文字幕\",\n                      \"status\": 1,\n                      \"sort\": 0\n                  },\n              ],\n       },\n       \"msg\": \"请求成功\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Gateway"
  },
  {
    "type": "get",
    "url": "/categories/app/:appId",
    "title": "获取分类信息",
    "group": "Gateway",
    "name": "______",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "appId",
            "description": "<p>应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用分类（后台可配置应用拥有哪些分类）,不传则获取所有视频分类</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例",
          "content": "/categories/app",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.icon",
            "description": "<p>图标</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.description",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.video_num",
            "description": "<p>视频数量</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 476, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;服裝&quot;, &quot;icon&quot;: &quot;&quot;, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;remark&quot;: null, &quot;description&quot;: null, &quot;video_num&quot;: 615 }, { &quot;id&quot;: 477, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;台湾&quot;, &quot;icon&quot;: &quot;&quot;, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;remark&quot;: null, &quot;description&quot;: null, &quot;video_num&quot;: 615 }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Gateway"
  },
  {
    "type": "get",
    "url": "/subjects/app/:appId",
    "title": "获取主题信息(Getting subject)",
    "name": "_______Getting_subject_",
    "group": "Gateway",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "appId",
            "description": "<p>应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用主题（后台可配置应用拥有哪些主题）,不传则获取所有视频主题</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.icon",
            "description": "<p>图标</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.description",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>所属分类</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 1770, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;辦公室OL&quot;, &quot;description&quot;: null, &quot;remark&quot;: null, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;category_id&quot;: 476 }, { &quot;id&quot;: 1771, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;制服&quot;, &quot;description&quot;: null, &quot;remark&quot;: null, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;category_id&quot;: 476 }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Gateway"
  },
  {
    "type": "get",
    "url": "/subjects/categories",
    "title": "根据分类获取主题",
    "name": "________",
    "group": "Gateway",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "category_ids",
            "description": "<p>分类ID,可选。根据分类ID获取指定分类下的主提。不传则获取所有分类下的主题</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "string",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "number",
            "optional": false,
            "field": "data.sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;video&quot;: [ { &quot;id&quot;: 461, &quot;created_at&quot;: &quot;2019-07-15 10:59:45&quot;, &quot;updated_at&quot;: &quot;2019-07-15 10:59:45&quot;, &quot;name&quot;: &quot;HD&quot;, &quot;status&quot;: 1, &quot;sort&quot;: 0 }, { &quot;id&quot;: 462, &quot;created_at&quot;: &quot;2019-07-15 11:48:06&quot;, &quot;updated_at&quot;: &quot;2019-07-15 11:48:06&quot;, &quot;name&quot;: &quot;中文字幕&quot;, &quot;status&quot;: 1, &quot;sort&quot;: 0 }, ], }, &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Gateway"
  },
  {
    "type": "post",
    "url": "/adverts/:appId",
    "title": "获取广告配置",
    "name": "______",
    "group": "Setting",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "appId",
            "description": "<p>应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用分类（后台可配置应用拥有哪些分类）,不传则获取所有视频分类</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ &quot;id&quot;: 1, &quot;name&quot;: &quot;首页轮播图广告&quot;, &quot;status&quot;: 1, &quot;app_id&quot;: 1, &quot;sort&quot;: 0, &quot;remark&quot;: &quot;&quot;, &quot;created_at&quot;: &quot;2019-08-19 01:56:03&quot;, &quot;updated_at&quot;: &quot;2019-08-19 01:56:03&quot;, &quot;advert&quot;: [ { &quot;id&quot;: 4, &quot;img&quot;: &quot;images/1f9005bb57dff0289f761116d5bc1e64.jpg&quot;, &quot;url&quot;: &quot;http://www.baidu.com&quot;, &quot;status&quot;: 1, &quot;sort&quot;: 0, &quot;remark&quot;: &quot;&quot;, &quot;started_at&quot;: null, &quot;expired_at&quot;: null, &quot;advert_position_id&quot;: 1, &quot;created_at&quot;: &quot;2019-09-01 02:41:14&quot;, &quot;updated_at&quot;: &quot;2019-09-01 02:41:14&quot; },</p> <pre><code>    ],    &quot;msg&quot;: &quot;请求成功&quot; }</code></pre>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Setting"
  },
  {
    "type": "post",
    "url": "/site-bottom/:appId",
    "title": "获取底部栏目配置",
    "name": "________",
    "group": "Setting",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "appId",
            "description": "<p>应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用分类（后台可配置应用拥有哪些分类）,不传则获取所有视频分类</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Setting"
  },
  {
    "type": "post",
    "url": "/user/video/:videoId/collect",
    "title": "用户收藏视频(User collect video)",
    "name": "User_collect_video________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "videoId",
            "description": "<p>必选,视频ID。根据uri规则附加到uri上。</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 401,\n  \"msg\": \"请求错误\",\n   \"data\": {\n\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/user/bind-phone",
    "title": "输入验证码并绑定手机(Binding phone)",
    "name": "_Binding_phone___________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>手机验证码</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 401,\n  \"msg\": \"请求错误\",\n   \"data\": {\n\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/user/sms/bind-phone",
    "title": "绑定手机发送验证码(Binding phone to sms)",
    "name": "_Binding_phone_to_sms___________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号码</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 401,\n  \"msg\": \"请求错误\",\n   \"data\": {\n\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/forget-password/send-code/email",
    "title": "(Email sending code)找回密码通过邮箱发送验证码",
    "name": "_Email_sending_code______________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nickname",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 403,\n  \"msg\": \"请求错误\",\n   \"data\": {\n       \"nickname\": [\n           \"用户名不存在\"\n       ]\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/feedback",
    "title": "提交反馈留言",
    "name": "_Feedback_______",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>可选,用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          },
          {
            "group": "Parameter",
            "type": "Sting",
            "optional": false,
            "field": "message",
            "description": "<p>必选,留言</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "score",
            "description": "<p>必选,分数</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/user/video/collect",
    "title": "获取视频收藏记录(Geting Collect)",
    "name": "_Geting_Collect_________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 430, &quot;created_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;updated_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;name&quot;: &quot;ランジェリーモデルを始めた妻の友人達が僕に迫ってきて… FAA-311\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=2OQZyVGmX1z&quot;, &quot;m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 334, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 34, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 401,\n  \"msg\": \"请求错误\",\n   \"data\": {\n\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/forget-password/send-code/phone",
    "title": "(Phone sending code)找回密码通过手机发送验证码",
    "name": "_Phone_sending_code______________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nickname",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 403,\n  \"msg\": \"请求错误\",\n   \"data\": {\n       \"nickname\": [\n           \"用户名不存在\"\n       ]\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/register/phone",
    "title": "通过手机会员注册(Rigister by phone)",
    "name": "_Rigister_by_phone_________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nickname",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>验证码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>确认密码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sex",
            "description": "<p>性别。1.男，0.女</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": "{\n \"status\": 403,\n \"msg\": \"请求错误\",\n  \"data\": {\n      \"password\": [\n          \"密码不正确\"\n      ]\n  }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/login",
    "title": "会员登录",
    "name": "____",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "account",
            "description": "<p>用户名/邮箱/手机号码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "remember_me",
            "description": "<p>,0不免登陆,1免登陆(永久)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 403,\n  \"msg\": \"请求错误\",\n   \"data\": {\n       \"password\": [\n           \"密码不正确\"\n       ]\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/reset/password",
    "title": "主动重置密码",
    "name": "______",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "old_password",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>新密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>确认密码</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 403,\n  \"msg\": \"请求错误\",\n   \"data\": {\n       \"old_password\": [\n           \"原密码不正确\"\n       ]\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/logout",
    "title": "会员退出登录",
    "name": "______",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 401,\n  \"msg\": \"请求错误\",\n   \"data\": {\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/forget-password/reset",
    "title": "找回密码重置密码",
    "name": "________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号码,可选</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱,可选</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>新密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>确认密码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>验证码</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 403,\n  \"msg\": \"请求错误\",\n   \"data\": {\n       \"code\": [\n           \"验证码不正确\"\n       ]\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/register/email",
    "title": "通过邮箱会员注册",
    "name": "________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nickname",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>确认密码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sex",
            "description": "<p>性别。1.男，0.女</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": "{\n \"status\": 403,\n \"msg\": \"请求错误\",\n  \"data\": {\n      \"password\": [\n          \"密码不正确\"\n      ]\n  }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/user/video/records",
    "title": "获取视频浏览记录(Skiming video)",
    "name": "_________Skiming_video_",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 430, &quot;created_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;updated_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;name&quot;: &quot;ランジェリーモデルを始めた妻の友人達が僕に迫ってきて… FAA-311\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=2OQZyVGmX1z&quot;, &quot;m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 334, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 34, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": " {\n  \"status\": 401,\n  \"msg\": \"请求错误\",\n   \"data\": {\n\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/register/sms",
    "title": "通过手机会员注册发送验证码",
    "name": "_____________",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "ValidationError:",
          "content": "{\n \"status\": 403,\n \"msg\": \"请求错误\",\n  \"data\": {\n      \"password\": [\n          \"密码不正确\"\n      ]\n  }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/search-videos",
    "title": "搜索视频",
    "name": "____",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "app_id",
            "description": "<p>应用ID，可选。不传则代表从所有片源里面搜索。传则从和应用中相关分类视频片源种搜索</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "keyword",
            "description": "<p>关键词</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "long_types",
            "description": "<p>长度类型</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "page",
            "description": "<p>分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 430, &quot;created_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;updated_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;name&quot;: &quot;ランジェリーモデルを始めた妻の友人達が僕に迫ってきて… FAA-311\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=2OQZyVGmX1z&quot;, &quot;m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 334, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 34, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "get",
    "url": "/video/:videoId",
    "title": "获取某条视频",
    "name": "______",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "videoId",
            "description": "<p>视频ID,必选。根据uri规则附加在uri。</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;:{ &quot;id&quot;: 430, &quot;created_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;updated_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;name&quot;: &quot;ランジェリーモデルを始めた妻の友人達が僕に迫ってきて… FAA-311\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=2OQZyVGmX1z&quot;, &quot;m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 334, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 34, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "get",
    "url": "/tags/videos",
    "title": "获取标签下视频",
    "name": "_______",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "tag_ids",
            "description": "<p>标签ID,可选。传则代表获取指定标签下的视频(以数组形式.数组有多个元素则代表多个分类),不传代表获取全部标签下的视频</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "long_types",
            "description": "<p>长度类型,可选。传则代表获取指定长度类型下的视频(以数组形式.数组有多个元素则代表多个获取长度类型.0.短视频(小于25分钟)，1.中长视频(小于60分钟)，2.长视频(大于60分钟)),不穿代表获取所有长度类型的视频</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "page",
            "description": "<p>分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>图标</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.description",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data.video",
            "description": "<p>数据集合</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 476, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;服裝&quot;, &quot;icon&quot;: &quot;&quot;, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;remark&quot;: null, &quot;description&quot;: null, &quot;category_id&quot;: 615, &quot;video&quot;: [ { &quot;id&quot;: 2976, &quot;created_at&quot;: &quot;2019-07-15 23:25:24&quot;, &quot;updated_at&quot;: &quot;2019-07-15 23:25:24&quot;, &quot;name&quot;: &quot;挑発するアニコス娘。 PARM-126\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=6vo8KpO4Zk4&quot;, &quot;m3u8&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 601, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 1, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, { &quot;id&quot;: 2737, &quot;created_at&quot;: &quot;2019-07-15 22:25:57&quot;, &quot;updated_at&quot;: &quot;2019-07-15 22:25:57&quot;, &quot;name&quot;: &quot;公司內外遇．松永紗奈\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1770, &quot;mainimg&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=RL5ZJQ5b8Yn&quot;, &quot;m3u8&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 410, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 10, } ], }, &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "get",
    "url": "/videos",
    "title": "获取视频列表(Video list)",
    "name": "_______Video_list_",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "ids",
            "description": "<p>视频ID,可选。获取指定类型的视频列表,不传则获取所有视频。</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "long_types",
            "description": "<p>长度类型,可选。获取指定长度类型的视频,不传则获取所有长度类型的视频。</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "page",
            "description": "<p>分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "order",
            "description": "<p>排序,可选。不传代表随机排序。可选项:&quot;see_num desc&quot;代表根据观看次数降序排序,&quot;see_num asc&quot;代表根据观看次数升序排序,&quot;collect_num desc&quot;根据收藏次数降序排序,&quot;collect_num asc&quot;根据收藏次数升序排序,&quot;created_at desc&quot;根据上传时间排序降序排序,&quot;created_at asc&quot;根据上传时间升序排序</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 430, &quot;created_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;updated_at&quot;: &quot;2019-07-15 11:47:20&quot;, &quot;name&quot;: &quot;ランジェリーモデルを始めた妻の友人達が僕に迫ってきて… FAA-311\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=2OQZyVGmX1z&quot;, &quot;m3u8&quot;: &quot;avhd101.com/8a990f4f-a6f1-11e9-a825-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 334, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 34, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, ], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "post",
    "url": "/user/like/:status/video/videoId:[0-9]+",
    "title": "用户点赞或者点踩",
    "name": "_________",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>必选,类型，1点赞，0点踩。根据uri规则附加到uri上。</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "videoId",
            "description": "<p>视频ID,必选。根据uri规则附加在uri。</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "get",
    "url": "/subjects/videos",
    "title": "获取指定主题下的视频",
    "name": "__________",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "subject_ids",
            "description": "<p>主题ID,可选。传则代表获取指定主题下的视频(以数组形式.数组有多个元素则代表多个分类),不传代表获取全部主题下的视频</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "long_types",
            "description": "<p>长度类型,可选。传则代表获取指定长度类型下的视频(以数组形式.数组有多个元素则代表多个获取长度类型.0.短视频(小于25分钟)，1.中长视频(小于60分钟)，2.长视频(大于60分钟)),不穿代表获取所有长度类型的视频</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "page",
            "description": "<p>分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "order",
            "description": "<p>排序，可选。不传代表随机排序。可选项:&quot;see_num desc&quot;代表根据观看次数降序排序,&quot;see_num asc&quot;代表根据观看次数升序排序,&quot;collect_num desc&quot;根据收藏次数降序排序,&quot;collect_num asc&quot;根据收藏次数升序排序,&quot;created_at desc&quot;根据上传时间排序降序排序,&quot;created_at asc&quot;根据上传时间升序排序</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>图标</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.description",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data.video",
            "description": "<p>数据集合</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 476, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;服裝&quot;, &quot;icon&quot;: &quot;&quot;, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;remark&quot;: null, &quot;description&quot;: null, &quot;category_id&quot;: 615, &quot;video&quot;: [ { &quot;id&quot;: 2976, &quot;created_at&quot;: &quot;2019-07-15 23:25:24&quot;, &quot;updated_at&quot;: &quot;2019-07-15 23:25:24&quot;, &quot;name&quot;: &quot;挑発するアニコス娘。 PARM-126\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=6vo8KpO4Zk4&quot;, &quot;m3u8&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 601, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 1, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, { &quot;id&quot;: 2737, &quot;created_at&quot;: &quot;2019-07-15 22:25:57&quot;, &quot;updated_at&quot;: &quot;2019-07-15 22:25:57&quot;, &quot;name&quot;: &quot;公司內外遇．松永紗奈\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1770, &quot;mainimg&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=RL5ZJQ5b8Yn&quot;, &quot;m3u8&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 410, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 10, } ], }, &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "get",
    "url": "/categories/videos",
    "title": "获取指定分类下的视频（Getting category video）",
    "name": "___________Getting_category_video_",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "category_ids",
            "description": "<p>分类ID,可选。传则代表获取指定分类下的视频(以数组形式.数组有多个元素则代表多个分类),不传代表获取全部分类下的视频</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "long_types",
            "description": "<p>长度类型,可选。传则代表获取指定长度类型下的视频(以数组形式.数组有多个元素则代表多个获取长度类型.0.短视频(小于25分钟)，1.中长视频(小于60分钟)，2.长视频(大于60分钟)),不穿代表获取所有长度类型的视频</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "page",
            "description": "<p>分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "order",
            "description": "<p>排序，可选。不传代表随机排序。可选项:&quot;see_num desc&quot;代表根据观看次数降序排序,&quot;see_num asc&quot;代表根据观看次数升序排序,&quot;collect_num desc&quot;根据收藏次数降序排序,&quot;collect_num asc&quot;根据收藏次数升序排序,&quot;created_at desc&quot;根据上传时间排序降序排序,&quot;created_at asc&quot;根据上传时间升序排序</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "String",
            "description": "<p>} msg  消息</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>数据</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>数据id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.created_at",
            "description": "<p>创建时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.icon",
            "description": "<p>图标</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.status",
            "description": "<p>状态码,忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.description",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video_num",
            "description": "<p>视频数量</p>"
          },
          {
            "group": "Success",
            "type": "Object",
            "optional": false,
            "field": "data.video",
            "description": "<p>数据集合</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.id",
            "description": "<p>视频Id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.icon",
            "description": "<p>视频图标,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.category_id",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.subject_id",
            "description": "<p>主题id</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.mainimg",
            "description": "<p>主图地址</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.crawler_url",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.original_m3u8",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.m3u8",
            "description": "<p>m3u8文件位置</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.original_mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.mp4",
            "description": "<p>忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.long",
            "description": "<p>视频时长,秒数</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.see_num",
            "description": "<p>视频观看次数,不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "data.video.tag_ids",
            "description": "<p>视频标签ID</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.need_charge",
            "description": "<p>是否需要充值,忽略.1需要，0不需要</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.real_see_num",
            "description": "<p>真实观看次数,忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.collect_num",
            "description": "<p>收藏次数，不一定真实(供展现使用)</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "real_collect_num",
            "description": "<p>真实收藏次数，忽略</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.status",
            "description": "<p>状态,1有效，0无效.忽略该字段</p>"
          },
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "data.video.long_type",
            "description": "<p>长度类型，0.短视频，1.中长视频，2.短视频</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [ { &quot;id&quot;: 476, &quot;created_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;updated_at&quot;: &quot;2019-07-15 07:33:58&quot;, &quot;name&quot;: &quot;服裝&quot;, &quot;icon&quot;: &quot;&quot;, &quot;sort&quot;: 0, &quot;status&quot;: 1, &quot;remark&quot;: null, &quot;description&quot;: null, &quot;video_num&quot;: 615, &quot;video&quot;: [ { &quot;id&quot;: 2976, &quot;created_at&quot;: &quot;2019-07-15 23:25:24&quot;, &quot;updated_at&quot;: &quot;2019-07-15 23:25:24&quot;, &quot;name&quot;: &quot;挑発するアニコス娘。 PARM-126\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1773, &quot;mainimg&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=6vo8KpO4Zk4&quot;, &quot;m3u8&quot;: &quot;avhd101.com/9c4e4145-a716-11e9-abb6-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 601, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 1, &quot;real_collect_num&quot;: 0, &quot;status&quot;: 1, &quot;long_type&quot;: 0 }, { &quot;id&quot;: 2737, &quot;created_at&quot;: &quot;2019-07-15 22:25:57&quot;, &quot;updated_at&quot;: &quot;2019-07-15 22:25:57&quot;, &quot;name&quot;: &quot;公司內外遇．松永紗奈\\n&quot;, &quot;icon&quot;: &quot;&quot;, &quot;category_id&quot;: 476, &quot;subject_id&quot;: 1770, &quot;mainimg&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/images/cover.jpg&quot;, &quot;original_m3u8&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;crawler_url&quot;: &quot;https://avhd101.com/watch?v=RL5ZJQ5b8Yn&quot;, &quot;m3u8&quot;: &quot;avhd101.com/672213f6-a713-11e9-ab4f-e0d55e8c9d4a/original/pv.m3u8&quot;, &quot;original_mp4&quot;: &quot;&quot;, &quot;mp4&quot;: &quot;&quot;, &quot;long&quot;: 0, &quot;see_num&quot;: 410, &quot;tag_ids&quot;: &quot;&quot;, &quot;need_charge&quot;: 0, &quot;real_see_num&quot;: 0, &quot;collect_num&quot;: 10, } ], }, &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  },
  {
    "type": "post",
    "url": "/user/see/video/:videoId",
    "title": "观看视频事件(客户端观看视频需触发此接口)",
    "name": "_____________________",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "videoId",
            "description": "<p>必选,视频ID。根据uri规则附加到uri上。</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success": [
          {
            "group": "Success",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>消息</p>"
          },
          {
            "group": "Success",
            "optional": false,
            "field": "Example",
            "description": "<p>Success-Response: HTTP/1.1 200 OK { &quot;status&quot;: 200, &quot;data&quot;: [], &quot;msg&quot;: &quot;请求成功&quot; }</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Video"
  }
] });
