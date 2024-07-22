"""
This script injects a Javascript to the .
"""
from mitmproxy import http
from mitmproxy import ctx
from selenium import webdriver
from bs4 import BeautifulSoup
import mysql.connector
from vars import *

def load(l):
    l.add_option("fb_url", str, " ", "A custom option")

def response(flow: http.HTTPFlow) -> None:
   customfb = ctx.options.fb_url
   customfb = "https:--www.facebook.com-"+customfb
   #print('avattar:  '+customfb)
   my_query = '"select avatar_lang.lang from avatar_lang inner join childs on childs.child_id = avatar_lang.child_id where childs.child_fb_url ='+customfb+'"'
   mydb = mysql.connector.connect(
     host="localhost",
     user="the_encase_user",
     password="SEou!gR[p$=YLqrI4Q9$",
     database="encase"
   )
   mycursor = mydb.cursor()
   sql_select_query = "select avatar_lang.lang from avatar_lang inner join childs on childs.child_id = avatar_lang.child_id where childs.child_fb_url = %s"
   mycursor.execute(sql_select_query, (customfb,))
   myresult = mycursor.fetchone()
   #myresult = 'en'
   #print(myresult[0])

   myreflect = "<script src='https://code.jquery.com/jquery-3.3.1.min.js' integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=' crossorigin='anonymous'></script><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js'></script><script src='"+js_vars+"vars.js'></script><script> var fb_url='"+customfb+"';</script><script src='"+js_vars+myresult[0]+"/avatar.js'></script><link rel='stylesheet' type='text/css' href='"+js_vars+myresult[0]+"/avatar.css'></head>"
   if flow.request.host == "www.facebook.com":
        flow.response.headers["Content-Security-Policy"] = "script-src https://upload.facebook.com/* *.facebook.com *.fbcdn.net *.facebook.net *.jquery.com *.jsdelivr.net *.cloudflare.com  *.cut.ac.cy:*  https://encase-backend.socialcomputing.eu:* *.google-analytics.com *.virtualearth.net *.google.com 127.0.0.1:* *.spotilocal.com:* 'unsafe-inline' 'unsafe-eval' *.atlassolutions.com blob: data: 'self'"
	#flow.response.headers[            "Content-Security-Policy"] = "script-src https://upload.facebook.com/* *.facebook.com *.fbcdn.net *.facebook.net *.jquery.com *.jsdelivr.net *.cloudflare.com  http://proxyencase.cut.ac.cy  http://proxyencase.cut.ac.cy*  http://proxyencase.cut.ac.cy:* http://proxyencase.cut.ac.cy:8090/* https//proxyencase.cut.ac.cy https://proxyencase.cut.ac.cy* https://proxyencase.cut.ac.cy https://proxyencase.cut.ac.cy:* https://proxyencase.cut.ac.cy:8090/* https://encase-backend.socialcomputing.eu:* *.google-analytics.com *.virtualearth.net *.google.com 127.0.0.1:* *.spotilocal.com:* 'unsafe-inline' 'unsafe-eval' *.atlassolutions.com blob: data: 'self'" 

#"script-src https://upload.facebook.com/* *.facebook.com *.fbcdn.net *.facebook.net *.jquery.com *.jsdelivr.net *.cloudflare.com http://proxyencase.cut.ac.cy:8090/* https://proxyencase.cut.ac.cy:8090/* https://proxyencase.cut.ac.cy:8090/* https://backendencase.cut.ac.cy:* *.google-analytics.com *.virtualearth.net *.google.com 127.0.0.1:* *.spotilocal.com:* 'unsafe-inline' 'unsafe-eval' *.atlassolutions.com blob: data: 'self'"
        reflector = b""+myreflect.encode()
        flow.response.content = flow.response.content.replace(b"</head>", reflector)

   elif flow.request.host == "twitter.com":
    csr = flow.response.headers["Content-Security-Policy"]
    new_csr = csr.split(";")
    new_csr[0] = "connect-src * data: blob: 'unsafe-inline'"
    new_csr[1] = new_csr[1] +" https://proxyencase.cut.ac.cy:* https://proxyencase.cut.ac.cy:8090/* http://proxyencase.cut.ac.cy:* http://proxyencase.cut.ac.cy:8090/* https://backendencase.cut.ac.cy:* *.jquery.com *.jsdelivr.net *.cloudflare.com"
    nonce = "nonce-"
    noncehash = new_csr[9].partition(nonce)[2].replace("'","")
    new_csr[9] = new_csr[9].replace("'unsafe-inline'", "'unsafe-inline' http://proxyencase.cut.ac.cy:8090/* http://proxyencase.cut.ac.cy:8090/* https://proxyencase.cut.ac.cy:* https://proxyencase.cut.ac.cy:8090/* https://backendencase.cut.ac.cy:* *.jquery.com *.jsdelivr.net *.cloudflare.com")
    new_csr[10] =new_csr[10]+ " https://proxyencase.cut.ac.cy:* http://proxyencase.cut.ac.cy:8090/* *.jquery.com *.jsdelivr.net *.cloudflare.com"
    new_csr[5] = new_csr[5]+ "https://proxyencase.cut.ac.cy:* http://proxyencase.cut.ac.cy:8090/*"
    final_csr=';'.join(new_csr)
    flow.response.headers["Content-Security-Policy"] = final_csr
    print(final_csr)
    if "/i/" not in flow.request.pretty_url:
      if not flow.request.pretty_url.endswith('.js'):
        if not flow.request.pretty_url.endswith('.json'):
          if flow.request.pretty_url.startswith("https://twitter.com/"):
          #  new_headers = flow.response.headers["Content-Security-Policy"] + "; script-src 'self' *.cloudflare.com https://proxyencase.cut.ac.cy:8090/*"
          #  flow.response.headers[
          #        "Content-Security-Policy"] = new_headers
          #  print(flow.response.headers["Content-Security-Policy"])
            csr = flow.response.headers["Content-Security-Policy"]
            twitter_reflect = "<script src='https://code.jquery.com/jquery-3.3.1.min.js' integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=' crossorigin='anonymous' nonce='"+noncehash+"'></script><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js' nonce='"+noncehash+"'></script><script src='"+js_vars+"vars.js' nonce='"+noncehash+"'></script><script src='"+js_vars+"gr/avatar.js' nonce='"+noncehash+"'></script><link rel='stylesheet' type='text/css' href='"+js_vars+"gr/avatar.css'><body>"
            reflector = b""+myreflect.encode()
            twitter_reflector = b""+twitter_reflect.encode()
            flow.response.content = flow.response.content.replace(b"<body>", twitter_reflector)
   else:
    #flow.response.headers[
    #      "Content-Security-Policy"] = "default-src * 'unsafe-inline' 'unsafe-eval' script-src * 'unsafe-inline' 'unsafe-eval' connect-src * 'unsafe-inline' img-src * data: blob: 'unsafe-inline' frame-src * style-src * 'unsafe-inline'"
    flow.response.headers[
          "Content-Security-Policy"] = "default-src *  data: blob: filesystem: about: ws: wss: 'unsafe-inline' 'unsafe-eval' 'unsafe-dynamic'; script-src * data: blob: 'unsafe-inline' 'unsafe-eval'; connect-src * data: blob: 'unsafe-inline'; img-src * data: blob: 'unsafe-inline'; frame-src * data: blob: ; style-src * data: blob: 'unsafe-inline'; font-src * data: blob: 'unsafe-inline' https://proxyencase.cut.ac.cy:* https://proxyencase.cut.ac.cy:8090/* https://backendencase.cut.ac.cy:* *.jquery.com *.jsdelivr.net *.cloudflare.com;"
    flow.response.headers["Access-Control-Allow-Headers"] = "*"
    reflector = b""+myreflect.encode()
    print("ssssss __  ")
    print(reflector)
    flow.response.content = flow.response.content.replace(b"</head>", reflector)


