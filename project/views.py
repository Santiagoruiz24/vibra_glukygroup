from django.http import HttpResponse
from django.shortcuts import render, redirect 
from django.views.generic import View
from django.urls import reverse_lazy
from .form import LoginForm
from django.contrib.auth import authenticate, login

# def index(request):
#     return render(request,'index.html',{
        
#     })

class LoginView(View):
    form_class = LoginForm
    template_name = 'index.html'

    def get(self, request):
        form = self.form_class()
        return render(request, self.template_name, {'form': form})

    def post(self, request):
        form = self.form_class(request.POST)
        if form.is_valid():
            username = form.cleaned_data['username']
            password = form.cleaned_data['password']
            user = authenticate(request, username=username, password=password)
            if user is not None:
                login(request, user)
                return redirect('index.html')
        return render(request, self.template_name, {'': form})