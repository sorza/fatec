from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('cadastro/', views.cadastro, name='cadastro'),    
    path('remove/<str:id>/', views.remove_atividade, name='remove')

]