{% extends '../layout/index.volt' %}

{% block title %}Index{% endblock %}

{% block content %}
    <h1>Hello World! from Dashboard Module</h1>
    <a href="{{url('backoffice')}}">Link to Backoffice</a>
{% endblock %}