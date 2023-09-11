Rails.application.routes.draw do
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html
  get "new" => "users#new"
  get "index" => "users#index"
  get "profile/:id" => "users#profile"
  get "/logout" => "users#logout"
  get "/followers_visitor/:id" => "users#followers_visitor"
  get "/followers/:id" => "users#followers"
  get "/following/:id" => "users#following"
  get "/unfollow/:id" => "users#unfollow"
  get "/follow/:follower/:followed" => "users#follow"
  get "/profile/:profile_id/view/:view_id" => "users#view"
  post "create" => "users#create"
  post "login" => "users#login"
  # Defines the root path route ("/")
  root "users#index"
end
