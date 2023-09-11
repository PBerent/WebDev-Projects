class User < ApplicationRecord
#validations
    validates :name, presence: true, length: { in: 2..20 }, uniqueness: { case_sensitive: false }
    validates :password, presence: true, length: { in: 2..20 }

# For followers
    has_many :followed_users, foreign_key: :follower_id, class_name: 'Follow'
    has_many :followeds, through: :followed_users, source: :followed

# For following
    has_many :follower_users, foreign_key: :followed_id, class_name: 'Follow'
    has_many :followers, through: :follower_users, source: :follower
end
