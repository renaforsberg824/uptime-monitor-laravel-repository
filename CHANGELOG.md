# Changelog

All notable changes to `laravel-uptime-monitor` will be documented in this file

## 3.0.0 - 2017-xx-xx

- add support for Laravel 5.5, drop support for Laravel 5.4
- renamed config file from `laravel-uptime-monitor` to `uptime-monitor`

## 2.2.0 - 2017-03-13

- add `retry_connection_after_milliseconds` to config file

## 2.1.0 - 2017-03-13

- add `sync` command

## 2.0.3 - 2017-03-13

- fixed bug in getting unchecked monitors

## 2.0.2 - 2017-03-08

- added monitor location to mail notifications

## 2.0.1 - 2017-01-27

- ask for protocol when creating a monitor

## 2.0.0 - 2017-01-24

- add support for L5.4
- drop support for L5.3

## 1.2.3 - 2017-01-14

- fixed bug where migration could be published multiple times

## 1.2.2 - 2017-01-06

- set fallback text for Slack notifications

## 1.2.1 - 2016-12-22

- fix typos in notifications

## 1.2.0 - 2016-12-22

- improve notifications

## 1.1.2 - 2016-12-19

- fix `CertificateCheckSucceeded` notification

## 1.1.1 - 2016-12-12

- fix typos in command descriptions

## 1.1.0 - 2016-12-03

- added `additional_headers` to config

## 1.0.2 - 2016-11-24

- fix descriptions in config file

## 1.0.1 - 2016-11-21

- fix custom model instructions in config file

## 1.0.0 - 2016-11-21

- initial release
