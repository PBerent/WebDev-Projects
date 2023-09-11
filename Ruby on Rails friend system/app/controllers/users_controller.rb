class UsersController < ApplicationController
    def index
        render "users/index"
    end

    def login
        @user = user_params
        @login_user = User.find_by(name: @user["name"])
        if @login_user && @login_user.password == @user["password"]
            session[:user] = @login_user
            session[:followers] = @login_user.followers
            session[:followeds] = @login_user.followeds
            session[:joined] = @login_user["created_at"].strftime("%B %d, %Y")
            session[:latest_users] = User.order(created_at: :desc).limit(5)

            redirect_to "/profile/#{@login_user.id}", notice: 'Logged in successfully!', status: :moved_permanently
            puts "success"
        else
            # Handle invalid username or password
            redirect_to "/index", notice: 'Invalid username or password'
            puts "fail"
        end
    end

    def new
        @user = User.new
        render "users/new"
    end

      # POST /users or /users.json
    def create
        # puts user_params
        @user = User.new(user_params)

        respond_to do |format|
            if @user.save
                format.html { redirect_to "/index", notice: "User was successfully created." }
                format.json { render :show, status: :created, location: @user }
            else
                format.html { render :new, status: :unprocessable_entity }
                format.json { render json: @user.errors, status: :unprocessable_entity }
            end
        end
    end

    def logout
        session[:user] = nil
        session[:followers]
        session[:followeds]
        session[:joined]
        redirect_to "/index", notice: 'Logged out successfully!', status: :moved_permanently
    end

    def profile
        @login_user = User.find_by(id: params[:id])
        session[:followers] = @login_user.followers
        session[:followeds] = @login_user.followeds
        
    end

    def view
        @view_user = User.find_by(id: params[:view_id])
        session[:view_user] = @view_user
        session[:view_followers] = @view_user.followers
        session[:view_followeds] = @view_user.followeds
        session[:view_joined] = @view_user["created_at"].strftime("%B %d, %Y")
        if params[:view_id] == params[:profile_id]
            redirect_to "/profile/#{session[:user]["id"]}"
        else
            render "users/view"
        end
    end

    def follow
        follow = Follow.new(follower: User.find(params[:follower]), followed: User.find(params[:followed]))
        if follow
            follow.save
        end
        redirect_back fallback_location: {}
    end

    def unfollow
        Follow.find_by(followed_id: params[:id]).destroy
        if follow.destroy
            render json: { status: 'Success', message: 'Unfollowed successfully' }
        else
            render json: { status: 'Error', message: 'Failed to unfollow' }
        end
    end

    def followers
        @data = User.find_by(id: params[:id]).followers
        render "users/followers"
    end

    def followers_visitor
        @data = User.find_by(id: params[:id]).followers
        render "users/followers_visitor"
    end

    def following
        @data = User.find_by(id: params[:id]).followeds
        render "users/following"
    end


    private
    def user_params
        params.require(:user).permit(:name, :password)
    end
end
