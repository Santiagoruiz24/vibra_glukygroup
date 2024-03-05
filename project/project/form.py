from django import forms
from django.contrib.auth.forms import AuthenticationForm

class LoginForm(AuthenticationForm):
    username = forms.CharField(max_length=150, label='Nombre de usuario')
    password = forms.IntegerField(label='Cédula', widget=forms.NumberInput)

class LoginForm(AuthenticationForm):
    username = forms.CharField(max_length=150, label='Nombre de usuario')
    password = forms.IntegerField(label='Contraseña', widget=forms.NumberInput)

    # def clean(self):
    #     cleaned_data = super().clean()
    #     return cleaned_data