import glob
import json
import os
import urllib.parse

import requests
import tweepy
import urllib3


urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

url = "https://proxyencase.cut.ac.cy:18082/dal/SaveTweetID"

headers = {
    'content-type': "application/json",
    'cache-control': "no-cache",
    'postman-token': "c0ee94e2-7c21-b23e-56fe-59cc8221663f"
}

headers_parent = {
    'cache-control': "no-cache",
    'postman-token': "2f26e978-6a5b-68aa-d59e-187871f879bd"
}

consumer_key = 'WVDb9oTz6cj4VuklxoBlvt1Mu'
consumer_secret = 'RA15eTzDraU3c1EkBPTO5tkGMg31IqNBX45XbBdk3ZVWl0DfMg'
access_token = '734323901166157824-f3u52d9BvLvbKsa3GJ5xVd06LmYLogO'
access_token_secret = 'ocNgsuWBt5i5NNeYU1e3cy2uflMPiHYluOnOt9BXp7H4V'

# OAuth process, using the keys and tokens
auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)
# Creation of the actual interface, using authentication
api = tweepy.API(auth)

a = []
b = []
os.chdir("/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_json_get_show_user")
for filea in glob.glob("*.json"):
    a.append(filea)
for child_twitter in glob.glob("*.twittername"):
    child_twitter == child_twitter
os.chdir("/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_json_user_timeline")
for fileb in glob.glob("*.json"):
    b.append(fileb)
for child_twittercomp in glob.glob("*.twittername"):
    if child_twittercomp == child_twitter:
        child_twitter == child_twitter
a = sorted(a)
b = sorted(b)
for i in range(len(a)):
    string_forSpam = 'GalatasaraySK'
    string_forFake = 'GalatasaraySK'
    child_twitter='home'
    tweetid = '4892'
    
    if string_forSpam in a[i]:
       screen_name = a[i].replace("get_show_user_", "").replace(".json","")
       behavior = 'spam'
       fake_user_detect = ''
    if string_forFake in b[i]:
       screen_name = b[i].replace("user_timeline_", "").replace(".json","")
       fake_user_detect = 'Account is a bot'
       data = {'child_twitter': child_twitter, 'tweetid': tweetid, 'screen_name': screen_name,
                        'behavior': behavior, 'read': '10',
                        'fake_account': fake_user_detect, 'read_fake': '0'}
#       print(data)
       headers = {
                'content-type': "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                'Content-Type': "application/x-www-form-urlencoded",
                'cache-control': "no-cache",
                'Postman-Token': "c3b9e124-e848-49ad-8846-c5139429580c"
            }

       data_json = json.dumps(data)
       payload = data_json
       print(payload)
       response = requests.request("POST", url, data=payload, headers=headers, verify=False)
       print(response)
''' 

    os.system(
        'java -jar /home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/detectUserBehavior.jar -inputU '
        '"/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_json_get_show_user/' + str(
            a[i]) + '" -inputT "/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_json_user_timeline/' + str(b[i]) +
        '" -inputM "/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/input_files/" -output '
        '" /home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_export/" -classifier "NB"')
    os.remove('/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_json_get_show_user/' + a[i])
    os.remove('/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_json_user_timeline/' + b[i])
for filename in os.listdir('/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_export/'):
    # print(filename)
    with open('/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_export/' + filename) as f:
        data = json.load(f)
        tweetid = data['uid']
        behavior = data['behavior']
        u = api.get_user(tweetid)
        # print(u.screen_name)
        url_fake_user_detection = "http://18.222.186.113:8888/AstroScreen/"

        querystring = {"API_KEY": "DEMO-wsp7hlugehzbg5jiyi", "screen_name": u.screen_name}

        response_fake_user_detection = requests.request("GET", url_fake_user_detection, headers=headers,
                                                        params=querystring)
        data_fake = response_fake_user_detection.json()
        child_twitter = child_twitter.replace('.twittername', '')
        if "classification_result_text" in data_fake:
            fake_user_detect = data_fake["classification_result_text"]
            if fake_user_detect == 'Real Account':
                # print(fake_user_detect)
                data = {'child_twitter': child_twitter, 'tweetid': tweetid, 'screen_name': u.screen_name,
                        'behavior': behavior, 'read': '0'}
                url_parent_notif = "https://encase-proxy.socialcomputing.eu:8090/api/public/nots"
                payload = {'text': "Encase Sensed that the user : " + u.screen_name + " is " + behavior, 'fb_url':child_twitter,'href':'#'}
                headers = {
                    'content-type': "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                    'Content-Type': "application/x-www-form-urlencoded",
                    'cache-control': "no-cache",
                    'Postman-Token': "c3b9e124-e848-49ad-8846-c5139429580c"
                }

                response = requests.request("POST", url_parent_notif, data=payload, headers=headers_parent,
                                            verify=False)
#                print(response.text)
            else:
                data = {'child_twitter': child_twitter, 'tweetid': tweetid, 'screen_name': u.screen_name,
                        'behavior': behavior, 'read': '0',
                        'fake_account': fake_user_detect, 'read_fake': '0'}
                url_parent_notif = "https://encase-proxy.socialcomputing.eu:8090/api/public/nots"
                payload = {'text': "Encase Sensed that the user : " + u.screen_name + " is " + behavior +"& the " + fake_user_detect, 'fb_url':child_twitter,'href':'#'}

                headers = {
                    'content-type': "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                    'Content-Type': "application/x-www-form-urlencoded",
                    'cache-control': "no-cache",
                    'Postman-Token': "c3b9e124-e848-49ad-8846-c5139429580c"
                }
                response = requests.request("POST", url_parent_notif, data=payload, headers=headers_parent,
                                            verify=False)
#                print('2')

        else:
            print('API ASTRO Does not work !!')
            data = {'child_twitter': child_twitter, 'tweetid': tweetid, 'screen_name': u.screen_name,
                    'behavior': behavior, 'read': '0'}
            url_parent_notif = "https://encase-proxy.socialcomputing.eu:8090/api/public/nots"
            payload = {'text': "Encase Sensed that the user : " + u.screen_name + " is " + behavior,
                       'fb_url': child_twitter, 'href': '#'}
            headers = {
                'content-type': "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                'Content-Type': "application/x-www-form-urlencoded",
                'cache-control': "no-cache",
                'Postman-Token': "c3b9e124-e848-49ad-8846-c5139429580c"
            }

            response = requests.request("POST", url_parent_notif, data=payload, headers=headers_parent, verify=False)
#            print('3')

    response = requests.request("POST", url_parent_notif, headers=headers_parent, verify=False)
#    print('4')
    data_json = json.dumps(data)
    payload = data_json
    # print(payload)
    response = requests.request("POST", url, data=payload, headers=headers, verify=False)
    os.remove('/home/cut/proxy/Encase_IWP/mitmproxy/encase/twitter/twitter_export/' + filename)

''' 
