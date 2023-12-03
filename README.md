# Logistics-tracking

### Application involved

- **Backend**: Laravel 10
- **Database**: Mysql 8.0
- **Cache**: Redis

All 3 services are served with Docker, manually pull the latest repo from github.

### Features

- Sno Query API: `{DOMAIN}/api?sno={}`
- Fake API: `{DOMAIN}/api/fake?num={}`
- Cache query result according to SNO
- Upload logistics report to S3 scheduled by crontab.
([Sample files](https://logistics-tracking.s3.ap-northeast-1.amazonaws.com/reports/2023-12-03_08-00-02.json))

註：快取的部分我預想是用 sno 當 key、JSON 當 value 的結構來儲存，但 Laravel 似乎可以直接快取 model Class，我就先以這樣來實作了。
